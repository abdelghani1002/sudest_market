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
        <div class="flex items-end justify-between">
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
        <div class="flex dark:text-gray-300">
            <small class="mr-1 product_quantity">{{ $product->quantity }}</small>
            <small>units available</small>
        </div>
    </div>
    <div class="p-2 md:p-4 flex gap-2 w-full">
        <form action="#"
            class="flex items-center justify-center text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
            <button class="py-2.5 px-2 md:px-5 inline-flex">
                <svg class="w-5 h-5 -ms-2 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z" />
                </svg>
                Add to favorites
            </button>
        </form>
        @if ($product->quantity > 0)
            <form method="POST" action="{{ route('add_to_cart', $product) }}"
                class="flex-grow text-white sm:mt-0 bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800 flex items-center justify-center">
                @csrf
                @method('POST')
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <button class="py-2.5 px-2 md:px-5 inline-flex">
                    <svg class="w-5 h-5 -ms-2 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6" />
                    </svg>
                    Add to carkt
                </button>
            </form>
        @else
            <button
                class="text-gray-500 sm:mt-0 bg-gray-300 cursor-not-allowed focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm dark:bg-gray-600 dark:focus:ring-gray-700 flex items-center justify-center py-2.5 px-2 md:px-5">
                <svg class="w-5 h-5 -ms-2 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6" />
                </svg>
                Out of stock
            </button>
        @endif
    </div>
</a>
