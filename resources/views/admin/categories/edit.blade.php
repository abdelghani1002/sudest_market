@vite('resources/css/categories.css')
<x-admin-layout>
    <div class="px-2 md:ml-64 h-full pt-14 flex flex-row">
        <div class="flex flex-col justify-center w-full">
            <h3 class="w-full text-2xl font-bold text-green-500 text-center">Categories - edit</h3>
            <div class="flex flex-row items-center w-full py-2 justify-between">
                <!-- Success&Error alert -->
                @if (session('success'))
                    <p data-icon="success" data-title="Success." class="alert text-green-400">
                        {{ session('success') }}
                    </p>
                @elseif (session('error'))
                    <p data-icon="error" data-title="Error!" class="alert text-red-400">
                        {{ session('error') }}
                    </p>
                @endif
            </div>
            <form action="{{ route('categories.update', $category) }}" method="post" class="w-full flex flex-col items-center"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="w-4/5 md:w-1/2 flex flex-col justify-between">

                    <!-- Name -->
                    <div class="mb-3">
                        <label for="name" class="block mb-1 text-sm font-medium dark:text-gray-300">Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}"
                            class="form-input w-full rounded-md dark:bg-gray-800 dark:text-gray-300">
                        @error('name')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3 flex justify-center w-full text-center">
                        <div class="w-5/6 md:w-1/3 overflow-hidden">
                            <img class="object-cover max-h-40 rounded-md m-auto" src="{{ asset($category->photo_src) }}" alt="category-photo">
                        </div>
                    </div>

                    <!-- Photo -->
                    <div class="mb-3 flex justify-between w-full">
                        <div class="w-full">
                            <label for="photo"
                                class="block mb-1 text-sm font-medium dark:text-gray-300">Photo</label>
                            <input type="file" name="photo" id="photo"
                                class="border border-gray-500 form-input w-full rounded-md dark:bg-gray-800 dark:text-gray-300">
                            @error('photo')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="flex justify-center mt-4">
                    <button type="submit"
                        class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                        Create Category
                    </button>
                </div>

            </form>
        </div>
    </div>
</x-admin-layout>
