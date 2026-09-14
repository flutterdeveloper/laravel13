@extends('layouts.app')

@section('content')
    <div class="mx-auto w-full max-w-3xl px-6 py-12 lg:px-8 lg:py-16">
        <a href="{{ route('products.index') }}" class="text-sm text-[#706f6c] underline underline-offset-4 hover:text-[#f53003] dark:text-[#A1A09A] dark:hover:text-[#FF4433]">Back to products</a>
        <div class="mt-8">
            <div class="mb-4 flex items-center gap-3 text-sm font-semibold uppercase tracking-[0.2em] text-[#f53003] dark:text-[#FF4433]"><span class="h-px w-8 bg-current"></span>New product</div>
            <h1 class="text-4xl font-semibold tracking-tight">Add product</h1>
            <p class="mt-3 text-[#706f6c] dark:text-[#A1A09A]">Add clear details so customers know what they are getting.</p>
        </div>

        <form method="POST" action="{{ route('products.store') }}" class="mt-10 border border-[#dedbd2] bg-[#fbfaf7] p-6 shadow-[6px_6px_0_#dedbd2] dark:border-[#3E3E3A] dark:bg-[#161615] dark:shadow-[6px_6px_0_#3E3E3A] sm:p-8">
            @include('products._form', ['submitLabel' => 'Create product'])
        </form>
    </div>
@endsection
