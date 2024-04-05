@vite('resources/css/categories.css')
<x-seller-layout>
    <div class="p-4 md:ml-64 h-screen overflow-y-scroll scrollbar-hidden pt-20">
        <div class="flex flex-col">
            <form method="POST" action="{{ route('seller.mystore.categories.update') }}" class="flex flex-wrap justify-between">
                @csrf
                @method('PUT')
                <ul class="grid w-full gap-6 grid-cols-2 md:grid-cols-4 lg:grid-cols-5">
                    @foreach ($categories as $category)
                        <li class="relative flex">
                            <input type="checkbox" id="cat_{{ $category->id }}" name="categories[]" value="{{ $category->id }}"
                                class="hidden peer" @checked($store->categories->contains($category))>
                            <label for="cat_{{ $category->id }}"
                                class="flex flex-col justify-between w-full p-3 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-blue-600  hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                <div class="flex-grow">
                                    <img src="{{ asset($category->photo_src) }}" class="h-full w-full rounded text-lg font-semibold" />
                                </div>
                                <div class="block">
                                    <div class="w-full text-lg font-semibold">{{ $category->name }}</div>
                                </div>
                            </label>
                            <span
                                class="hidden absolute top-0 right-0 rounded bg-blue-600 peer-checked:block">
                                <svg class="w-5 h-5 p-0 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                  </svg>
                            </span>
                        </li>
                    @endforeach
                </ul>
                <div class="mt-4 flex justify-center md:justify-end w-full">
                    <span>
                        <button type="button" class="px-3 py-1 bg-gray-300 rounded">Cancel</button>
                        <button class="px-3 py-1 bg-blue-500 rounded text-white">Save changes</button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</x-seller-layout>
