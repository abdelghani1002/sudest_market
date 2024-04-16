<a href="{{ route('products.show', $product) }}"
    class="hover:scale-[101%] bg-white dark:bg-slate-800 m-2 rounded-lg overflow-hidden shadow-lg ring-2 hover:ring-4 ring-green-500 ring-opacity-70 max-w-sm w-full md:w-[30%] flex flex-col justify-between">
    <div class="relative w-full  dark:text-gray-300">
        <img class="w-full object-cover max-h-56"
            @if (file_exists($product->primary_photo_src)) src="{{ asset($product->primary_photo_src) }}"
            @else
            src="{{ asset('storage/photos/product_default.png') }}" @endif
            alt="Product Image">
        <div class="p-2">
            <h3 class="text-lg dark:text-gray-200 font-medium mb-2">{{ $product->name }}</h3>
            <p class="text-gray-600 text-sm mb-4 dark:text-gray-300">
                @if ($product->summary)
                    {{ $product->summary }}
                @else
                    {{ Str::limit($product->description, 80, '...') }}
                @endif
            </p>
            <span class="font-medium mb-2 bg-gray-200 dark:bg-gray-600 p-1 rounded-md">
                @if ($product->category)
                    {{ $product->category->name }}
                @else
                    ---
                @endif
            </span>
        </div>
    </div>
    <div class="p-4">
        <div class="flex items-end mt-4 justify-between">
            <span class="flex items-center gap-1">
                <span class="font-bold p-0 text-lg dark:text-gray-200">{{ $product->price }} MAD</span>
            </span>
            <span class="mt-3 text-lime-500 inline-flex items-center">More Details
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                </svg>
            </span>
        </div>
    </div>
</a>
