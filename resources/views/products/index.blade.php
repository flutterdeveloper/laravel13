@extends('layouts.app')

@section('content')
    <div class="mx-auto w-full max-w-6xl px-6 py-12 lg:px-8 lg:py-16">
        <div class="flex flex-col gap-6 border-b border-[#dedbd2] pb-8 dark:border-[#3E3E3A] sm:flex-row sm:items-end sm:justify-between">
            <div>
                <div class="mb-4 flex items-center gap-3 text-sm font-semibold uppercase tracking-[0.2em] text-[#f53003] dark:text-[#FF4433]"><span class="h-px w-8 bg-current"></span>Catalog</div>
                <h1 class="text-4xl font-semibold tracking-tight sm:text-6xl">Products</h1>
                <p class="mt-4 max-w-xl text-[#706f6c] dark:text-[#A1A09A]">Manage your catalog in one calm, focused workspace.</p>
            </div>
            <a href="{{ route('products.create') }}" class="inline-flex items-center justify-center gap-2 bg-[#f53003] px-5 py-3 text-sm font-medium text-white shadow-[4px_4px_0_#1b1b18] transition hover:-translate-y-0.5 hover:bg-[#c22600] hover:shadow-[6px_6px_0_#1b1b18] dark:shadow-[4px_4px_0_#EDEDEC] dark:hover:shadow-[6px_6px_0_#EDEDEC]">
                <span class="text-lg leading-none">+</span> Add product
            </a>
        </div>

        <div class="grid gap-px border border-[#dedbd2] bg-[#dedbd2] dark:border-[#3E3E3A] dark:bg-[#3E3E3A] sm:grid-cols-3">
            <div class="bg-[#fbfaf7] px-5 py-4 dark:bg-[#161615]"><p class="text-xs uppercase tracking-[0.16em] text-[#706f6c] dark:text-[#A1A09A]">Total products</p><p class="mt-1 text-2xl font-semibold">{{ $products->total() }}</p></div>
            <div class="bg-[#fbfaf7] px-5 py-4 dark:bg-[#161615]"><p class="text-xs uppercase tracking-[0.16em] text-[#706f6c] dark:text-[#A1A09A]">Page size</p><p class="mt-1 text-2xl font-semibold">{{ $products->count() }}</p></div>
            <div class="bg-[#fbfaf7] px-5 py-4 dark:bg-[#161615]"><p class="text-xs uppercase tracking-[0.16em] text-[#706f6c] dark:text-[#A1A09A]">Workspace</p><p class="mt-1 text-2xl font-semibold">Live</p></div>
        </div>

        @if ($products->isEmpty())
            <div class="mt-10 border border-dashed border-[#c9c9c4] px-6 py-16 text-center dark:border-[#62605b]">
                <h2 class="text-xl font-semibold">No products yet</h2>
                <p class="mx-auto mt-2 max-w-md text-[#706f6c] dark:text-[#A1A09A]">Add your first product to start building the catalog.</p>
                <a href="{{ route('products.create') }}" class="mt-6 inline-flex border border-[#1b1b18] px-5 py-3 text-sm font-medium transition hover:bg-[#1b1b18] hover:text-white dark:border-[#EDEDEC] dark:hover:bg-[#EDEDEC] dark:hover:text-[#1b1b18]">Create product</a>
            </div>
        @else
            <div class="mt-8 grid gap-5 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($products as $product)
                    <article class="group flex min-h-64 flex-col justify-between border border-[#dedbd2] bg-[#fbfaf7] p-6 transition hover:-translate-y-1 hover:border-[#f53003] hover:shadow-[6px_6px_0_#f53003] dark:border-[#3E3E3A] dark:bg-[#161615] dark:hover:border-[#FF4433] dark:hover:shadow-[6px_6px_0_#FF4433]">
                        <div>
                            <div class="flex items-start justify-between gap-4">
                                <h2 class="text-xl font-semibold transition-colors group-hover:text-[#f53003] dark:group-hover:text-[#FF4433]">{{ $product->name }}</h2>
                                <span class="shrink-0 border px-2 py-1 text-xs {{ $product->stock > 0 ? 'border-emerald-200 text-emerald-700 dark:border-emerald-900 dark:text-emerald-300' : 'border-red-200 text-red-700 dark:border-red-900 dark:text-red-300' }}">
                                    {{ $product->stock > 0 ? 'In stock' : 'Sold out' }}
                                </span>
                            </div>
                            <p class="mt-3 line-clamp-2 text-sm leading-6 text-[#706f6c] dark:text-[#A1A09A]">{{ $product->description ?: 'No description added.' }}</p>
                        </div>
                        <div class="mt-8 flex items-end justify-between gap-4">
                            <div>
                                <p class="text-2xl font-semibold">${{ number_format((float) $product->price, 2) }}</p>
                                <p class="mt-1 text-xs text-[#706f6c] dark:text-[#A1A09A]">{{ $product->stock }} available</p>
                            </div>
                            <a href="{{ route('products.show', $product) }}" class="text-sm font-medium text-[#f53003] underline underline-offset-4 hover:text-[#c22600] dark:text-[#FF4433]">View details <span aria-hidden="true">↗</span></a>
                        </div>
                    </article>
                @endforeach
            </div>

            <div class="mt-8">{{ $products->links() }}</div>
        @endif
    </div>
@endsection
