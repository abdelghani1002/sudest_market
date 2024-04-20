<x-app-layout>
    <div class="container pt-5 px-3 md:px-8 dark:bg-gray-800">
        {{-- Categories header --}}
        <div class="relative mb-5">
            <div id="categories_header" class="flex items-center flex-nowrap overflow-x-scroll scrollbar-hide">
                <button id="prev" aria-label="slide backward"
                    class="hidden absolute z-30 focus:outline-none cursor-pointer p-3 rounded-full bg-gray-400 bg-opacity-50 dark:bg-gray-500 dark:bg-opacity-55">
                    <svg class="dark:text-gray-900" width="10" height="10" viewBox="0 0 8 14" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M7 1L1 7L7 13" stroke="currentColor" stroke-width="3" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </button>
                @foreach ($categories as $cat)
                    <a href="{{ route('categories.show', $cat) }}" @class([
                        'px-3 py-2 mx-2 rounded-full text-nowrap border border-gray-300 dark:text-gray-300' => true,
                        'bg-green-800 text-white' => $cat->id == $category->id,
                        'hover:bg-gray-200 dark:hover:text-gray-800' => $cat->id != $category->id,
                    ])>
                        {{ $cat->name }}
                    </a>
                @endforeach
                <button id="next" aria-label="slide backward"
                    class="rotate-180 -right-0 absolute z-30 focus:outline-none cursor-pointer p-3 rounded-full bg-gray-400 bg-opacity-50 dark:bg-gray-500 dark:bg-opacity-55">
                    <svg class="dark:text-gray-900" width="10" height="10" viewBox="0 0 8 14" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M7 1L1 7L7 13" stroke="currentColor" stroke-width="3" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
        </div>

        {{-- Category product --}}
        <div>
            <div id="place_result" class="flex flex-wrap px-2 md:px-6 gap-2 pb-10 pt-2 justify-center w-full">
                @unless ($category->products->isEmpty())
                    @foreach ($category->products as $product)
                        <x-product-card :product="$product" />
                    @endforeach
                @else
                    <div class="h-[70vh] flex items-center">
                        <h2 class="text-center text-2xl dark:text-green-200">No product found</h2>
                    </div>
                @endunless
            </div>
        </div>
    </div>
    <script>
        categories_header.addEventListener('scroll', () => {
            if (categories_header.scrollLeft > 0) prev.classList.remove('hidden');
            else prev.classList.add('hidden');

            if (categories_header.scrollLeft + categories_header.clientWidth < categories_header.scrollWidth - 20)
                next.classList.remove('hidden');
            else next.classList.add('hidden');
        });
    </script>
</x-app-layout>
