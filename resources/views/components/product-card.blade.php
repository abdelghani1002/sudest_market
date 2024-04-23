<a href="{{ route('products.show', $product) }}"
    class="hover:scale-[101%] bg-white dark:bg-slate-800 m-2 rounded-lg overflow-hidden shadow-lg ring-2 hover:ring-4 ring-green-500 ring-opacity-70 max-w-sm w-full md:w-[30%] flex flex-col justify-between">
    <div class="relative w-full  dark:text-gray-300">
        <img class="w-full object-cover h-56"
            @if (file_exists($product->primary_photo_src)) src="{{ asset($product->primary_photo_src) }}"
            @else src="{{ asset('storage/photos/product_default.png') }}"
            @endif
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
            <span class="font-medium bg-gray-200 dark:bg-gray-600 p-1 rounded-md">
                @if ($product->category)
                    {{ $product->category->name }}
                @else
                    ---
                @endif
            </span>
        </div>
    </div>
    <div class="px-2">
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
    <div class="p-2 md:py-4 flex gap-2 w-full">
        @auth
            <form id="removeFromFavorites" action="{{ route('remove_from_favorites', $product) }}" method="POST"
                @class([
                    'remove-from-favorites items-center justify-center text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700' => true,
                    'hidden' => !auth()->user()->favorites->contains($product),
                    'flex' => auth()->user()->favorites->contains($product),
                ])>
                @csrf
                @method('DELETE')
                <button class="remove-btn text-nowrap py-2.5 px-3 md:px-5 inline-flex">
                    <svg class="fill-pink-600 w-5 h-5 -ms-2 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6.002C6.5 1 1 8 5.782 13.001L12 19l6.23-5.999C23 8 17.5 1 12 6.002Z" />
                    </svg>
                    Unwishlist
                </button>
                <button class="loading hidden text-nowrap py-2.5 px-3 md:px-5">
                    <div role="status">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-200 animate-spin dark:text-gray-600 fill-green-600"
                            viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                fill="currentColor" />
                            <path
                                d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                fill="currentFill" />
                        </svg>
                        <span class="sr-only">Loading...</span>
                    </div>
                </button>
            </form>

            <form id="addToFavorites" action="{{ route('add_to_favorites', $product) }}" method="POST"
                @class([
                    'add-to-favorites items-center justify-center text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700' => true,
                    'hidden' => auth()->user()->favorites->contains($product),
                    'flex' => !auth()->user()->favorites->contains($product),
                ])>
                @csrf
                <button class="add-btn text-nowrap py-2.5 px-3 md:px-5 inline-flex">
                    <svg class="w-5 h-5 -ms-2 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z" />
                    </svg>
                    Wishlist
                </button>
                <button class="loading hidden text-nowrap py-2.5 px-3 md:px-5">
                    <div role="status">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-200 animate-spin dark:text-gray-600 fill-green-600"
                            viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                fill="currentColor" />
                            <path
                                d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                fill="currentFill" />
                        </svg>
                        <span class="sr-only">Loading...</span>
                    </div>
                </button>
            </form>
        @endauth

        @if ($product->quantity > 0)
            <form id="addToCart" method="POST" action="{{ route('add_to_cart', $product) }}"
                class="add-to-cart flex-grow text-white sm:mt-0 bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800 flex items-center p-0 justify-center">
                @csrf
                @method('POST')
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <button class="text-nowrap py-2.5 px-3 md:px-5 inline-flex">
                    <svg class="w-5 h-5 -ms-2 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6" />
                    </svg>
                    Add to cart
                </button>
            </form>
        @else
            <button
                class="text-nowrap flex-grow text-gray-800 sm:mt-0 bg-gray-300 cursor-not-allowed focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm dark:bg-gray-600 dark:focus:ring-gray-700 flex items-center justify-center py-2.5 px-2 md:px-5">
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
