@vite('resources/css/categories.css')
<x-seller-layout>
    <div class="py-4 md:ml-64 h-screen overflow-y-hidden pt-16">
        <div class="flex flex-row items-center py-1 w-full px-2 justify-between">
            <h3 class="md:text-2xl font-bold text-cyan-800 dark:text-cyan-300">{{ $category->name }}</h3>
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
            <a class="cursor-pointer text-white font-bold bg-green-700 rounded-xl p-2 h-10 hover:bg-green-800"
                href="{{ route('products.create', $category) }}">
                <strong class="font-extrabold">+</strong> Add Product
            </a>
        </div>


        <div
            class="flex flex-col justify-between md:h-[79dvh] w-full md:overflow-x-hidden overflow-y-scroll overflow-x-scroll">

            <!-- Products Table -->
            <table id="products_table"
                class="table-auto w-full text-sm whitespace-no-wrap border-spacing-2 px-2 pb-2 overflow-y-scroll overflow-x-scroll">
                <thead class="">
                    <tr class="bg-gray-400 dark:bg-gray-950 dark:text-gray-300">
                        <th class="p-1 border-r border-gray-200">#</th>
                        <th class="p-1 border-r border-gray-200">Name</th>
                        <th class="p-1 border-r border-gray-200">Price</th>
                        <th class="p-1 border-r border-gray-200 text-nowrap">Qty on hand</th>
                        <th class="p-1 border-r border-gray-200">Sales</th>
                        <th class="p-1 border-r border-gray-200">Status</th>
                        <th class="p-1 border-r border-gray-200">Date added</th>
                        <th class="p-1 border-r border-gray-200" colspan="3">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @unless ($products->count() == 0)
                        @foreach ($products as $product)
                            <tr
                                class="odd:bg-gray-200 even:bg-gray-300 dark:odd:bg-gray-800 dark:even:bg-gray-700 dark:text-gray-300">

                                <td class="p-2 border-r border-white">
                                    <div class="flex justify-center w-full items-center gap-x-2">
                                        <img class="min-w-10 min-h-10 md:w-16 md:h-16 object-cover rounded-sm"
                                            src="{{ asset($product->primary_photo_src) }}" alt="product photo">
                                    </div>
                                </td>

                                <td class="p-2 border-r border-white">
                                    <p class="text-center text-nowrap">
                                        {{ $product->name }}
                                    </p>
                                </td>

                                <td class="p-2 border-r border-white">
                                    <p class="text-center font-bold">
                                        {{ $product->price }} MAD
                                    </p>
                                </td>

                                <td class="p-2 border-r border-white">
                                    <p class="text-center">
                                        {{ $product->quantity }}
                                    </p>
                                </td>

                                <td class="p-2 border-r border-white">
                                    <p class="text-center">
                                        {{ $product->total_sales }}
                                    </p>
                                </td>

                                <td class="p-2 border-r border-white bg-">
                                    <p @class([
                                        'text-center font-bold p-1 rounded' => true,
                                        'text-green-400 bg-lime-200' => $product->status == 'active',
                                        'text-gray-500 dark:text-gray-400 bg-gray-400 dark:bg-gray-700' =>
                                            $product->status == 'inactive',
                                    ])>
                                        {{ $product->status }}
                                    </p>
                                </td>

                                <td class="p-2 border-r border-white">
                                    <p class="text-center text-nowrap">
                                        {{ $product->created_at->format('M d, Y') }}
                                    </p>
                                </td>

                                <td class="p-2 text-right border-r border-white">
                                    <div class="flex w-full justify-around items-center gap-2">
                                        <div>
                                            <form class="delete-form flex justify-center items-center m-0"
                                                action="{{ route('products.destroy', $product->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    class="flex hover:bg-red-500 font-semibold hover:text-white text-red-500 border border-red-500 rounded-md p-2">
                                                    <svg class="w-4" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                        <div>
                                            <a href="{{ route('products.edit', $product) }}"
                                                class="hover:bg-green-500 font-semibold p-2 hover:text-white text-green-500 border border-green-500 rounded-md flex">
                                                <svg class="w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                                </svg>
                                            </a>
                                        </div>
                                        <div>
                                            <a href="{{ route('products.show', $product) }}"
                                                class="flex items-center text-blue-600">
                                                <svg class="w-5 m-auto text-gray-700 hover:scale-125"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                    <path class="fill-cyan-400"
                                                        d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8" class="text-center p-4 dark:text-gray-400">
                                No products in this category.
                            </td>
                        </tr>
                    @endunless

                </tbody>
            </table>
            <div class="p-2 w-full">
                {{-- {{ $products->onEachSide(1)->links() }} --}}
            </div>
        </div>
    </div>
</x-seller-layout>
