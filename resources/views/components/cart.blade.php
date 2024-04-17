<div id="cart" data-dropdown="cart" data-dropdown-hidden="cartbtn"
    class="hidden absolute w-2/3 md:w-1/3 lg:w-1/4 right-1 top-16 max-w-xl mx-auto border border-green-400 rounded-md bg-gray-300 dark:bg-slate-700 dark:text-gray-300">
    <div class="shadow-lg rounded-lg overflow-hidden">
        <div class="flex items-center justify-between p-2 border-b border-green-300">
            <h1 class="text-lg font-bold mr-3">Shopping Cart</h1>
            <span class="">{{ $cart['products']->count() }} products</span>
        </div>
        @unless ($cart['total'] == 0)
            <div class="p-2">
                @foreach ($cart['products'] as $item)
                    <div class="border border-green-700 rounded-md flex items-center mb-2">
                        <img class="h-16 w-16 object-contain rounded-lg mr-4" src="{{ asset($item->primary_photo_src) }}"
                            alt="Product">
                        <div class="flex-1 mr-3">
                            <h2 class="text-lg font-bold">
                                {{ $item->name }}
                            </h2>
                            <span></span><span class="text-gray-500 dark:text-gray-300 font-bold">
                                {{ $item->price }} MAD
                                <small>
                                    ({{ $item->units }} units)
                                </small>
                            </span>
                        </div>
                        <form method="POST" action="{{ route('remove_from_cart') }}">
                            @csrf
                            @method('POST')
                            <input name="id" value="{{ $item->id }}" type="hidden">
                            <button class="text-gray-800 dark:text-white hover:text-red-500 dark:hover:text-red-400 px-2">
                                <svg class="w-6 h-6" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm7.707-3.707a1 1 0 0 0-1.414 1.414L10.586 12l-2.293 2.293a1 1 0 1 0 1.414 1.414L12 13.414l2.293 2.293a1 1 0 0 0 1.414-1.414L13.414 12l2.293-2.293a1 1 0 0 0-1.414-1.414L12 10.586 9.707 8.293Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </form>
                    </div>
                @endforeach

            </div>

            <div class="px-4 py-3">
                <div class="flex justify-between items-center">
                    <span class="font-bold">Total:</span>
                    <span class="font-bold text-lg underline text-lime-600 dark:text-white">
                        {{ $cart['total'] }} MAD
                    </span>
                </div>
                <form method="POST" action="{{ route('checkout') }}">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="products_ids[]" value="{{ $cart->pluck('id') }}">
                    <button class="block w-full mt-4 bg-lime-600 hover:bg-lime-700 text-white font-bold py-2 px-4 rounded">
                        Checkout
                    </button>
                </form>
            </div>
        @else
            <div class="text-center">
                <span class="text-gray-500 dark:text-gray-300">Cart is empty</span>
            </div>
        @endunless
    </div>
</div>
