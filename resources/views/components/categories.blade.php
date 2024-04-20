<section id="categories" class="categories-section mb-4 w-full bg-white p-4 md:py-3 md:px-8 lg:px-10 dark:bg-slate-900">

    <h2 class="my-4 text-2xl font-bold text-green-500 dark:text-green-300 uppercase">Poupular categories</h2>

    <div class="flex items-center justify-center w-full h-full px-4">
        <div class="w-full relative flex items-center justify-center">
            <button aria-label="slide backward"
                class="absolute z-30 -left-6 focus:outline-none cursor-pointer p-3 rounded-full bg-gray-400 bg-opacity-50 dark:bg-gray-500 dark:bg-opacity-55"
                id="prev">
                <svg class="dark:text-gray-900" width="14" height="14" viewBox="0 0 8 14" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M7 1L1 7L7 13" stroke="currentColor" stroke-width="3" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </button>
            <div class="w-full mx-auto overflow-x-hidden overflow-y-hidden">
                <div id="slider" class="flex flex-row gap-3 text-gray-50 transition ease-out duration-700 py-5">
                    @foreach ($categories as $category)
                        <div
                            class="border border-gray-300 dark:border-gray-500 drop-shadow-lg relative h-80 category-card hover:translate-y-1 cursor-pointer w-3/4 md:w-2/5 lg:w-1/6 shrink-0 rounded-lg overflow-hidden">
                            <img class="absolute z-1 w-full h-full object-cover rounded object-center"
                                src="{{ asset($category->photo_src) }}" alt="category name">
                            <a href="{{ route('categories.show', $category) }}" class="absolute z-2 w-full h-full p-2">
                                <p class="h-80 w-full">
                                    {{ $category->name }}
                                </p>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
            <button aria-label="slide forward"
                class="absolute z-30 -right-6 focus:outline-none cursor-pointer p-3 rounded-full bg-gray-400 bg-opacity-50 dark:bg-gray-500 dark:bg-opacity-55"
                id="next">
                <svg class="dark:text-gray-900" width="14" height="14" viewBox="0 0 8 14" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1L7 7L1 13" stroke="currentColor" stroke-width="3" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </button>
        </div>
    </div>
</section>

{{--
<div
    class="relative h-full category-card cursor-pointer w-3/4 md:w-2/5 lg:w-1/6 shrink-0 rounded-lg overflow-hidden">
    <img class="absolute z-1 w-full h-full object-cover rounded object-center"
        src="{{ asset($category->photo_src) }}" alt="category name">
    <div class="absolute z-2 w-full h-full p-3">
        <a href="#" class="h-fit">
            <p class="text-md text-gray-00">{{ $category->name }}</p>
            <h3 class="text-lg font-bold">{{ $category->slogan }}</h3>
        </a>
    </div>
</div>
--}}
