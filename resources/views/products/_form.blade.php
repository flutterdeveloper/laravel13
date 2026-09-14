@csrf

<div class="grid gap-7">
    <div>
        <label for="name" class="text-sm font-medium">Name</label>
        <input id="name" name="name" type="text" value="{{ old('name', $product->name ?? '') }}" required autofocus class="mt-2 block w-full border border-[#c9c9c4] bg-white px-4 py-3 outline-none transition placeholder:text-[#a09d94] focus:border-[#f53003] focus:ring-2 focus:ring-[#f53003]/20 dark:border-[#62605b] dark:bg-[#161615] dark:focus:border-[#FF4433]" placeholder="e.g. Field Notes">
        @error('name')
            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="description" class="text-sm font-medium">Description <span class="font-normal text-[#706f6c]">(optional)</span></label>
        <textarea id="description" name="description" rows="4" class="mt-2 block w-full resize-y border border-[#c9c9c4] bg-white px-4 py-3 outline-none transition placeholder:text-[#a09d94] focus:border-[#f53003] focus:ring-2 focus:ring-[#f53003]/20 dark:border-[#62605b] dark:bg-[#161615] dark:focus:border-[#FF4433]" placeholder="What makes this product useful?">{{ old('description', $product->description ?? '') }}</textarea>
        @error('description')
            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror
    </div>

    <div class="grid gap-6 sm:grid-cols-2">
        <div>
            <label for="price" class="text-sm font-medium">Price</label>
            <div class="relative mt-2">
                <span class="pointer-events-none absolute inset-y-0 left-4 flex items-center text-[#706f6c]">$</span>
                <input id="price" name="price" type="number" value="{{ old('price', $product->price ?? '') }}" min="0" step="0.01" required class="block w-full border border-[#c9c9c4] bg-white py-3 pl-9 pr-4 outline-none transition focus:border-[#f53003] focus:ring-2 focus:ring-[#f53003]/20 dark:border-[#62605b] dark:bg-[#161615] dark:focus:border-[#FF4433]" placeholder="0.00">
            </div>
            @error('price')
                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="stock" class="text-sm font-medium">Stock</label>
            <input id="stock" name="stock" type="number" value="{{ old('stock', $product->stock ?? 0) }}" min="0" step="1" required class="mt-2 block w-full border border-[#c9c9c4] bg-white px-4 py-3 outline-none transition focus:border-[#f53003] focus:ring-2 focus:ring-[#f53003]/20 dark:border-[#62605b] dark:bg-[#161615] dark:focus:border-[#FF4433]" placeholder="0">
            @error('stock')
                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>
    </div>
</div>

<div class="mt-8 flex flex-col-reverse gap-3 border-t border-[#e3e3e0] pt-6 dark:border-[#3E3E3A] sm:flex-row sm:justify-end">
    <a href="{{ route('products.index') }}" class="inline-flex items-center justify-center border border-[#c9c9c4] px-5 py-3 text-sm font-medium transition hover:border-[#1b1b18] dark:border-[#62605b] dark:hover:border-[#EDEDEC]">Cancel</a>
    <button type="submit" class="inline-flex items-center justify-center bg-[#1b1b18] px-5 py-3 text-sm font-medium text-white transition hover:bg-[#f53003] dark:bg-[#EDEDEC] dark:text-[#1b1b18] dark:hover:bg-[#FF4433]">{{ $submitLabel }}</button>
</div>
