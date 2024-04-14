@vite('resources/css/categories.css')
<x-seller-layout>
    <div class="p-4 md:ml-64 h-screen overflow-y-scroll scrollbar-hidden pt-16">
        <!-- Success&Error alert -->
        @if (session('success'))
            <p data-icon="success" data-title="Success." class="alert text-green-400 text-center">
                {{ session('success') }}
            </p>
        @elseif (session('error'))
            <p data-icon="error" data-title="Error!" class="alert text-red-400 text-center">
                {{ session('error') }}
            </p>
        @endif

        <div class="flex flex-col justify-between w-full overflow-x-scroll scrollbar-hide">
            <div class="px-3 h-full flex flex-col justify-between">
                @if (session('error'))
                    <p data-icon="error" data-title="Error!" class="alert text-red-400 text-center">
                        {{ session('error') }}
                    </p>
                @endif
                <h3 class="text-2xl font-semibold mb-4 dark:text-green-300">Edit Product</h3>

                <div class="flex flex-row justify-center h-full">
                    <form action="{{ route('products.update', $product) }}" method="post" enctype="multipart/form-data"
                        class="w-full flex flex-col justify-between h-full">
                        @csrf
                        @method('PUT')

                        {{-- Category --}}
                        <input type="hidden" name="category_id" value="{{ $product->category->id }}">

                        <div class="h-full flex flex-col md:flex-row gap-5">
                            {{-- Left of form --}}
                            <div class="md:w-1/2 md:h-full flex flex-col justify-between">
                                <!-- Name -->
                                <div class="mb-3">
                                    <label for="name" class="block mb-1 text-sm font-medium dark:text-gray-300">Name
                                        <x-required-input /> </label>
                                    <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}"
                                        class="form-input w-full rounded-md dark:bg-gray-800 dark:text-gray-300" required>
                                    @error('name')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>


                                <!-- Slug -->
                                <div class="mb-3">
                                    <label for="slug"
                                        class="block mb-1 text-sm font-medium dark:text-gray-300">Slug</label>
                                    <input type="text" id="slug" name="slug"
                                        class="w-full dark:bg-slate-800 border border-neutral-600 p-1.5 dark:text-gray-300 rounded-lg"
                                        value="{{ old('slug', $product->slug) }}"
                                    />
                                    @error('slug')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Summary -->
                                <div class="mb-3">
                                    <label for="summary"
                                        class="block mb-1 text-sm font-medium dark:text-gray-300">Summary</label>
                                    <input type="text" name="summary" id="summary" value="{{ old('summary', $product->summary) }}"
                                        class="form-input w-full rounded-md dark:bg-gray-800 dark:text-gray-300">
                                    @error('summary')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Primary Photo -->
                                <div class="mb-3">
                                    <label for="primary_photo"
                                        class="block mb-1 text-sm font-medium dark:text-gray-300">Primary Photo
                                    </label>
                                    <input type="file" name="primary_photo"  id="primary_photo"
                                        class="form-input border border-gray-500 w-full rounded-md dark:bg-gray-800 dark:text-gray-300"
                                    >
                                    @error('primary_photo')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="flex justify-between">
                                    <!-- Quantity -->
                                    <div class="w-5/12">
                                        <label for="quantity"
                                            class="block mb-1 text-sm font-medium dark:text-gray-300">Quantity
                                            <x-required-input /> </label>
                                        <input type="number" name="quantity" id="quantity"
                                            class="form-input w-full rounded-md dark:bg-gray-800 dark:text-gray-300"
                                            value="{{ old('quantity', $product->quantity) }}" required>
                                        @error('quantity')
                                            <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Price -->
                                    <div class="w-5/12">
                                        <label for="price"
                                            class="block mb-1 text-sm font-medium dark:text-gray-300">Price ( MAD
                                            ) <x-required-input /> </label>
                                        <input type="number" name="price" id="price"
                                            class="form-input w-full rounded-md dark:bg-gray-800 dark:text-gray-300"
                                            value="{{ old('price', $product->price) }}" required>
                                        @error('price')
                                            <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- Right of form --}}
                            <div class="md:w-1/2 flex flex-col min-h-full">
                                <!-- Photos -->
                                <div class="mb-3 flex justify-between w-full">
                                    <div class="w-full">
                                        <label for="photos"
                                            class="block mb-1 text-sm font-medium dark:text-gray-300">Additional
                                            Photos</label>
                                        <input type="file" multiple name="photos[]" id="photos"
                                            class="form-input border border-gray-500 w-full rounded-md dark:bg-gray-800 dark:text-gray-300">
                                        @error('photos')
                                            <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Status -->
                                <div class="mb-3 w-full">
                                    <label for="status"
                                        class="block mb-1 text-sm font-medium dark:text-gray-300">Status
                                        <x-required-input />
                                    </label>
                                    <ul class="grid w-full gap-6 grid-cols-2">
                                        <li>
                                            <input type="radio" id="active" name="status" value="active"
                                                class="hidden peer"
                                                @if (old('status', $product->status) == 'active')
                                                    checked
                                                @endif
                                            />
                                            <label for="active"
                                                class="inline-flex items-center justify-between w-full p-2 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-green-500 peer-checked:border-green-600 peer-checked:text-green-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                                <div class="block">
                                                    <div class="w-full text-lg font-semibold">Active</div>
                                                </div>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="radio" id="inactive" name="status" value="inactive"
                                                class="hidden peer"
                                                @if (old('status', $product->status) == 'inactive')
                                                    checked
                                                @endif
                                            />
                                            <label for="inactive"
                                                class="inline-flex items-center justify-between w-full p-2 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-green-500 peer-checked:border-green-600 peer-checked:text-green-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                                <div class="block">
                                                    <div class="w-full text-lg font-semibold">Inactive</div>
                                                </div>
                                            </label>
                                        </li>
                                    </ul>
                                    @error('status')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Description -->
                                <div class="flex flex-col flex-grow">
                                    <label for="description"
                                        class="block mb-1 text-sm font-medium dark:text-gray-300">Description
                                        <x-required-input />
                                    </label>
                                    <div class="flex flex-grow">
                                        <textarea name="description" id="description"
                                            class="flex flex-grow form-textarea w-full rounded-md dark:bg-gray-800 dark:text-gray-300" required>{{ old('description', $product->description) }}</textarea>
                                    </div>
                                    @error('description')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- Submit button --}}
                        <div class="flex justify-center mt-2">
                            <button type="submit"
                                class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800 focus:outline-none focus:shadow-outline-blue active:bg-green-800">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-seller-layout>
