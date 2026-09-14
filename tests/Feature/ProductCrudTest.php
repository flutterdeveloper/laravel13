<?php

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

describe('product CRUD', function () {
    it('renders the product catalog', function () {
        $product = Product::factory()->create(['name' => 'Field Notes']);

        $response = $this->get(route('products.index'));

        $response->assertOk()->assertSee('Field Notes');
    });

    it('creates a product with valid data', function () {
        $response = $this->post(route('products.store'), [
            'name' => 'Desk Lamp',
            'description' => 'A warm light for focused work.',
            'price' => '79.90',
            'stock' => 12,
        ]);

        $product = Product::query()->first();

        $response->assertRedirect(route('products.show', $product));
        $response->assertSessionHas('status', 'Product created successfully.');
        $this->assertDatabaseHas('products', [
            'name' => 'Desk Lamp',
            'price' => '79.90',
            'stock' => 12,
        ]);
    });

    it('rejects invalid product data', function () {
        $response = $this->from(route('products.create'))
            ->post(route('products.store'), [
                'name' => '',
                'price' => '-1',
                'stock' => '-2',
            ]);

        $response->assertRedirect(route('products.create'))
            ->assertSessionHasErrors(['name', 'price', 'stock']);
        $this->assertDatabaseCount('products', 0);
    });

    it('updates a product with valid data', function () {
        $product = Product::factory()->create(['name' => 'Old Name']);

        $response = $this->put(route('products.update', $product), [
            'name' => 'New Name',
            'description' => 'Updated description.',
            'price' => '24.50',
            'stock' => 8,
        ]);

        $response->assertRedirect(route('products.show', $product));
        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'name' => 'New Name',
            'price' => '24.50',
            'stock' => 8,
        ]);
    });

    it('deletes a product', function () {
        $product = Product::factory()->create();

        $response = $this->delete(route('products.destroy', $product));

        $response->assertRedirect(route('products.index'));
        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    });
});
