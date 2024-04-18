<x-app-layout title="{{ $user->name }}">
    <div
        class="dark:bg-gray-700 dark:text-gray-300 max-w-2xl mx-4 sm:max-w-sm md:max-w-sm lg:max-w-sm xl:max-w-sm sm:mx-auto md:mx-auto lg:mx-auto xl:mx-auto m-10 bg-white shadow-xl rounded-lg text-gray-900">
        <div class="rounded-t-lg h-32 overflow-hidden">
            <img class="object-cover object-top w-full"
                src='https://images.unsplash.com/photo-1549880338-65ddcdfd017b?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=400&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ'
                alt='Mountain'>
        </div>
        <div class="mx-auto w-32 h-32 relative -mt-16 rounded-full overflow-hidden">
            <img class="w-full" src={{ $user->photo_src }} alt='user photo'>
        </div>
        <div class="text-center mt-2">
            <h2 class="font-semibold">{{ $user->name }}</h2>
            <p class="text-gray-500 dark:text-gray-300">Freelance Web Designer</p>
        </div>
        <ul class="py-4 mt-2 text-gray-700 flex items-center justify-around">
            <li class="flex flex-col items-center justify-around dark:text-gray-300">
                <svg class="w-4 fill-current text-blue-900" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path
                        d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                </svg>
                <div>2k</div>
            </li>
            <li class="flex flex-col items-center justify-between dark:text-gray-300">
                <svg class="w-4 fill-current text-blue-900" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path
                        d="M7 8a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0 1c2.15 0 4.2.4 6.1 1.09L12 16h-1.25L10 20H4l-.75-4H2L.9 10.09A17.93 17.93 0 0 1 7 9zm8.31.17c1.32.18 2.59.48 3.8.92L18 16h-1.25L16 20h-3.96l.37-2h1.25l1.65-8.83zM13 0a4 4 0 1 1-1.33 7.76 5.96 5.96 0 0 0 0-7.52C12.1.1 12.53 0 13 0z" />
                </svg>
                <div>10k</div>
            </li>
            <li class="flex flex-col items-center justify-around dark:text-gray-300">
                <svg class="w-4 fill-current text-blue-900" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path
                        d="M9 12H1v6a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-6h-8v2H9v-2zm0-1H0V5c0-1.1.9-2 2-2h4V2a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v1h4a2 2 0 0 1 2 2v6h-9V9H9v2zm3-8V2H8v1h4z" />
                </svg>
                <div>15</div>
            </li>
        </ul>
    </div>

    {{-- @unless ($favProduct->count() == 0)
        <div class="px-10">
            <div class="">
                <h3 class="text-3xl font-bold dark:text-gray-300">Favorite Products</h3>
            </div>
            <div id="place_result"
                class="flex flex-wrap lg:px-32 px-8 gap-2 lg:justify-start md:justify-center pb-10 pt-2 justify-center w-full">
                @foreach ($favProduct as $product)
                    <x-card :product="$product" />
                @endforeach
            </div>
        </div>
    @endunless --}}

    @unless ($user->orders->count() == 0)
        <section id="orders" class="container p-4 mx-auto">
            <div class="flex flex-col">
                <h3 class="text-3xl font-bold dark:text-gray-300 mb-4">My orders</h3>
                <div class="">
                    <div class="w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="border border-gray-200 dark:border-gray-700 md:rounded-lg overflow-x-scroll">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead class="bg-gray-50 dark:bg-slate-800">
                                    <tr>
                                        <th scope="col"
                                            class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            <div class="flex items-center gap-x-3">
                                                <button class="flex items-center gap-x-2">
                                                    <span>N°</span>
                                                </button>
                                            </div>
                                        </th>

                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            Date
                                        </th>

                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            Status
                                        </th>

                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            Products
                                        </th>

                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            Amount
                                        </th>

                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-center rtl:text-right text-gray-500 dark:text-gray-400">
                                            Checkout
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                    @foreach ($user->orders as $order)
                                        <tr class="odd:bg-gray-200 even:bg-gray-300 dark:even:bg-gray-700 dark:odd:bg-gray-600">
                                            <td
                                                class="px-4 py-4 text-sm font-medium text-gray-700 dark:text-gray-200 whitespace-nowrap">
                                                <div class="inline-flex items-center gap-x-3">
                                                    <span>#{{ $order->id }}</span>
                                                </div>
                                            </td>
                                            <td
                                                class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                {{ \Carbon\Carbon::parse($order->created_at)->format('M j, Y') }}
                                            </td>
                                            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                                @if ($order->status == 'paid')
                                                    <div
                                                        class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 text-emerald-500 bg-emerald-100/60 dark:bg-gray-800">
                                                        <svg width="12" height="12" viewBox="0 0 12 12"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M10 3L4.5 8.5L2 6" stroke="currentColor"
                                                                stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </svg>

                                                        <span class="text-sm font-normal">Paid</span>
                                                    </div>
                                                @else
                                                    <div
                                                        class="inline-flex items-center px-3 py-1 text-red-500 rounded-full gap-x-2 bg-red-100/60 dark:bg-gray-800">
                                                        <svg width="12" height="12" viewBox="0 0 12 12"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M9 3L3 9M3 3L9 9" stroke="currentColor"
                                                                stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </svg>

                                                        <h2 class="text-sm font-normal">Unpaid</h2>
                                                    </div>
                                                @endif
                                            </td>
                                            <td
                                                class="min-w-60 px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                <div class="w-full relative flex flex-col justify-center gap-x-2">
                                                    <button
                                                        class="show_products dark:hover:bg-gray-800 p-2 rounded-md border flex justify-between">
                                                        <span>Show Products</span>
                                                        <span>
                                                            <svg class="w-6 h-6 text-gray-800 dark:text-white"
                                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                width="24" height="24" fill="currentColor"
                                                                viewBox="0 0 24 24">
                                                                <path fill-rule="evenodd"
                                                                    d="M18.425 10.271C19.499 8.967 18.57 7 16.88 7H7.12c-1.69 0-2.618 1.967-1.544 3.271l4.881 5.927a2 2 0 0 0 3.088 0l4.88-5.927Z"
                                                                    clip-rule="evenodd" />
                                                            </svg>
                                                        </span>
                                                    </button>
                                                    <div
                                                        class="products z-50 hidden w-full absolute dark:bg-gray-700 bg-slate-100 p-1 rounded-md top-10">
                                                        @foreach ($order->products as $product)
                                                            <div class="w-full flex items-center mb-2 border-b z-10">
                                                                <img class="h-8 w-8 object-contain rounded-md mr-2"
                                                                    src="{{ asset($product->primary_photo_src) }}"
                                                                    alt="Product photo">
                                                                <div class="flex-1">
                                                                    <h2 class="text-md font-bold">{{ $product->name }}</h2>
                                                                    <div class="flex justify-between">
                                                                        <span class="text-sm dark:text-gray-300 font-bold">
                                                                            {{ $product->price }}$
                                                                        </span>
                                                                        <span>
                                                                            {{ $product->pivot->units }} units
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </td>
                                            <td
                                                class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap font-bold">
                                                {{ $order->products->sum('price') }} $</td>
                                            <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                @if ($order->status == 'paid')
                                                    <div class="flex items-center justify-center">
                                                        <span class="p-1 rounded-full border border-green-500">
                                                            <svg width="12" height="12" viewBox="0 0 12 12"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10 3L4.5 8.5L2 6" class="stroke-green-500"
                                                                    stroke-width="1.5" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                            </svg>
                                                        </span>
                                                    </div>
                                                @else
                                                    <div class="flex items-center justify-center">
                                                        <form method="POST" action="{{ route('checkout') }}">
                                                            @csrf
                                                            @method('POST')
                                                            <input type="hidden" value="{{ $order->id }}"
                                                                name="order_id">
                                                            <button
                                                                class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                                                                Checkout
                                                            </button>
                                                        </form>
                                                    </div>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endunless

    @vite('resources/js/profile.js')
</x-app-layout>
