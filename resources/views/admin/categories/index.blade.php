@vite('resources/css/categories.css')
<x-admin-layout>
    <div class="px-2 md:ml-64 h-full pt-14 flex flex-row">
        <div class="w-full h-full">
            <div class="flex flex-row items-center w-full py-2 justify-between">
                <h3 class="text-2xl font-bold text-green-500 dark:text-green-500">Categories</h3>
                <!-- Success&Error alert -->
                @if (session('success'))
                    <p data-icon="success" data-title="Success." class="hidden alert text-green-400 text-center">
                        {{ session('success') }}
                    </p>
                @elseif (session('error'))
                    <p data-icon="error" data-title="Error!" class="hidden alert text-red-400 text-center">
                        {{ session('error') }}
                    </p>
                @endif
                <a class="cursor-pointer flex gap-1 text-white font-bold bg-green-500 rounded-xl p-2 h-10 hover:bg-green-600"
                    href="{{ route('categories.create') }}">
                    <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4.243a1 1 0 1 0-2 0V11H7.757a1 1 0 1 0 0 2H11v3.243a1 1 0 1 0 2 0V13h3.243a1 1 0 1 0 0-2H13V7.757Z"
                            clip-rule="evenodd" />
                    </svg>
                    Add Category
                </a>
            </div>

            <div class="flex flex-col justify-between w-full overflow-x-scroll scrollbar-hide">

                <!-- Categories Table -->
                <table id="categories_table"
                    class="table-auto w-full text-sm whitespace-no-wrap border-spacing-2 px-2 pb-2">
                    <thead class="">
                        <tr class="bg-gray-400">
                            <th class="p-1 border-r border-gray-300">Name</th>
                            <th class="p-1 border-r border-gray-300">Photo</th>
                            <th class="p-1 border-r border-gray-300 w-1/6">Products number</th>
                            <th class="p-1 w-1/12">
                                Manage
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr
                                class="odd:bg-gray-200 even:bg-gray-300 dark:odd:bg-gray-800 dark:even:bg-gray-700 dark:text-gray-300">

                                <td class="p-2 border-r border-gray-500">
                                    <div class="flex flex-row items-center gap-x-2">
                                        <p class="font-semibold text-center">{{ $category->name }}</p>
                                    </div>
                                </td>

                                <td class="p-2 border-r border-gray-500">
                                    <div class="flex justify-center">
                                        @if (file_exists($category->photo_src))
                                            <img class="category-image w-16 h-16 object-cover rounded-sm"
                                                src="{{ asset($category->photo_src) }}"
                                                alt="{{ $category->name }} photo">
                                        @endif
                                    </div>
                                </td>

                                <td class="p-2 border-r border-gray-500">
                                    <p class="text-center">
                                        {{-- {{ $category->products->count() }} --}}
                                    </p>
                                </td>

                                <td class="p-2 text-right flex flex-col md:flex-row justify-center items-center w-fit gap-3">
                                    <form class="delete-form flex justify-center items-center m-0 w-full md:w-1/2"
                                        action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="hover:bg-red-500 font-semibold h-full hover:text-white text-red-500 border border-red-500 rounded-md p-1 w-full md:p-2">
                                            Delete
                                        </button>
                                    </form>
                                    <div>
                                        <a href="{{ route('categories.edit', $category) }}"
                                            class="hover:bg-green-500 font-semibold p-1 w-full md:p-2 md:w-1/2 hover:text-white text-green-500 border border-green-500 rounded-md">
                                            Update
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pagination-links p-2 w-full">
                {{ $categories->links() }}
            </div>
        </div>
    </div>
</x-admin-layout>
