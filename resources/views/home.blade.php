<x-app-layout :cart="$cart">
    <x-hero-section />
    <x-categories :categories="$categories" />
    <div class="bg-blue-100 dark:bg-gray-800 px-4 py-8">
        <div class="flex gap-2 items-center justify-center">
            <span class="w-5 flex justify-center">
                <svg class="animate-bounce" xmlns="http://www.w3.org/2000/svg" width="34" height="34"
                    viewBox="0 0 24 24">
                    <path class="fill-green-400"
                        d="M21.947 9.179a1.001 1.001 0 0 0-.868-.676l-5.701-.453-2.467-5.461a.998.998 0 0 0-1.822-.001L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.213 4.107-1.49 6.452a1 1 0 0 0 1.53 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4 4.536-4.082c.297-.268.406-.686.278-1.065z">
                    </path>
                </svg>
            </span>
            <h3 class="text-center p-4 dark:text-green-200 text-2xl">Explore Moroccan Craftsmanship</h3>
            <span class="w-5 flex justify-center">
                <svg class="animate-bounce" xmlns="http://www.w3.org/2000/svg" width="34" height="34"
                    viewBox="0 0 24 24">
                    <path class="fill-green-400"
                        d="M21.947 9.179a1.001 1.001 0 0 0-.868-.676l-5.701-.453-2.467-5.461a.998.998 0 0 0-1.822-.001L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.213 4.107-1.49 6.452a1 1 0 0 0 1.53 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4 4.536-4.082c.297-.268.406-.686.278-1.065z">
                    </path>
                </svg>
            </span>
        </div>
        <div class="mb-5 px-5 md:px-8 lg:mx-24">
            <x-search :categories="$categories" />
        </div>
        <div>
            <div id="place_result" class="flex flex-wrap px-2 md:px-6 gap-2 pb-10 pt-2 justify-center w-full">
                @unless ($products->isEmpty())
                    @foreach ($products as $product)
                        <x-product-card :product="$product" />
                    @endforeach
                @else
                    No product found
                @endunless
            </div>
            <div class="px-2 md:px-6">
                <div>
                    {{ $products->links('pagination::simple-tailwind') }}
                </div>
            </div>
        </div>
    </div>
    @vite(['resources/js/search.js', 'resources/js/categories.js', 'resources/js/favorites.js'])
</x-app-layout>
