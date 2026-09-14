@extends('layouts.app')

@section('content')
    <div class="mx-auto w-full max-w-4xl px-6 py-12 lg:px-8 lg:py-16">
        <a href="{{ route('products.index') }}" class="text-sm text-[#706f6c] underline underline-offset-4 hover:text-[#f53003] dark:text-[#A1A09A] dark:hover:text-[#FF4433]">Back to products</a>

        <div class="mt-8 border border-[#dedbd2] bg-[#fbfaf7] p-6 shadow-[8px_8px_0_#dedbd2] dark:border-[#3E3E3A] dark:bg-[#161615] dark:shadow-[8px_8px_0_#3E3E3A] sm:p-10">
            <div class="flex flex-col gap-6 border-b border-[#e3e3e0] pb-8 dark:border-[#3E3E3A] sm:flex-row sm:items-start sm:justify-between">
                <div>
                    <div class="mb-4 flex items-center gap-3 text-sm font-semibold uppercase tracking-[0.2em] text-[#f53003] dark:text-[#FF4433]"><span class="h-px w-8 bg-current"></span>Product detail</div>
                    <h1 class="text-4xl font-semibold tracking-tight">{{ $product->name }}</h1>
                </div>
                <span class="w-fit border px-3 py-1.5 text-sm {{ $product->stock > 0 ? 'border-emerald-200 text-emerald-700 dark:border-emerald-900 dark:text-emerald-300' : 'border-red-200 text-red-700 dark:border-red-900 dark:text-red-300' }}">
                    {{ $product->stock > 0 ? 'In stock' : 'Sold out' }}
                </span>
            </div>

            <div class="grid gap-8 py-8 sm:grid-cols-[1fr_auto]">
                <div>
                    <h2 class="text-sm font-semibold uppercase tracking-[0.15em] text-[#706f6c] dark:text-[#A1A09A]">Description</h2>
                    <p class="mt-3 max-w-xl leading-7">{{ $product->description ?: 'No description added.' }}</p>
                </div>
                <dl class="grid grid-cols-2 gap-8 sm:block sm:min-w-40 sm:space-y-6">
                    <div>
                        <dt class="text-sm text-[#706f6c] dark:text-[#A1A09A]">Price</dt>
                        <dd class="mt-1 text-2xl font-semibold">${{ number_format((float) $product->price, 2) }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm text-[#706f6c] dark:text-[#A1A09A]">Stock</dt>
                        <dd class="mt-1 text-2xl font-semibold">{{ $product->stock }}</dd>
                    </div>
                </dl>
            </div>

            <div class="flex flex-col gap-3 border-t border-[#e3e3e0] pt-6 dark:border-[#3E3E3A] sm:flex-row sm:justify-between">
                <form method="POST" action="{{ route('products.destroy', $product) }}" onsubmit="return confirm('Delete this product?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline-flex w-full items-center justify-center px-1 py-3 text-sm font-medium text-red-600 underline underline-offset-4 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300 sm:w-auto">Delete product</button>
                </form>
                <a href="{{ route('products.edit', $product) }}" class="inline-flex items-center justify-center bg-[#1b1b18] px-5 py-3 text-sm font-medium text-white transition hover:bg-[#f53003] dark:bg-[#EDEDEC] dark:text-[#1b1b18] dark:hover:bg-[#FF4433]">Edit product</a>
            </div>
        </div>
    </div>
@endsection
