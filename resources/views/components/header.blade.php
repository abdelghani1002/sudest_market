<header class="p-0">
    <nav class="bg-white border-gray-200 px-2 md:px-4 lg:px-6 py-2.5 dark:bg-gray-800">
        <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
            <x-app-logo />
            <div class="flex items-center lg:order-2">
                <!-- Dark & Light Theme -->
                <x-theme-button />
                <!-- Navigation -->
                @auth
                    <!-- Avatar -->
                    <button type="button"
                        class="flex items-center mx-2 text-sm rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                        id="user-menu-button" aria-expanded="false" data-dropdown-toggle="dropdown">
                        <span class="sr-only">Open user menu</span>
                        <img class="w-8 h-8 rounded-full" src="{{ asset('default_user_photo.png') }}" alt="user photo" />
                        <span class="hidden md:block p-2 text-gray-700 dark:text-gray-300">{{ auth()->user()->name }}</span>
                    </button>
                    <!-- Dropdown menu -->
                    <div class="hidden z-50 my-4 w-56 text-base list-none bg-white overflow-hidden divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600 rounded-xl"
                        id="dropdown">
                        <div class="py-3 px-4">
                            <span
                                class="block text-sm font-semibold text-gray-900 dark:text-white">{{ auth()->user()->name }}</span>
                            <span
                                class="block text-sm text-gray-900 truncate dark:text-white">{{ auth()->user()->email }}</span>
                        </div>
                        <ul class="py-1 text-gray-700 dark:text-gray-300" aria-labelledby="dropdown">
                            <li>
                                <a href="{{ route('profile') }}"
                                    class="block py-2 px-4 text-sm hover:bg-green-200 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">My
                                    profile</a>
                            </li>
                        </ul>
                        @role('customer')
                            <ul class="p-2" aria-labelledby="dropdown">
                                @if (auth()->user()->sellerRequest && auth()->user()->sellerRequest->status === 'pending')
                                    <span
                                        class="block py-2 px-4 text-sm rounded-md text-center text-white bg-green-500 font-semibold">
                                        Seller Request Pending ...
                                    </span>
                                @else
                                    <form action="{{ route('become-seller') }}" method="POST"
                                        class="block rounded-md text-center text-white bg-green-500 hover:bg-green-600 hover:font-semibold">
                                        @csrf
                                        @method('POST')
                                        <button class="py-2 px-4 w-full">
                                            Become a Seller
                                        </button>
                                    </form>
                                @endif
                            </ul>
                        @endrole
                        <ul class="py-1 text-gray-700 dark:text-gray-300" aria-labelledby="dropdown">
                            <li>
                                <a href="{{ route('logout') }}"
                                    class="flex gap-2 py-2 px-4 text-sm hover:bg-green-200 dark:hover:bg-gray-600 dark:hover:text-white">
                                    <span>
                                        <svg class="w-6 h-6 text-gray-800 dark:text-white rotate-180" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                            viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M16 12H4m12 0-4 4m4-4-4-4m3-4h2a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3h-2" />
                                        </svg>
                                    </span>
                                    <span>Sign out</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                @else
                    <a href="{{ route('login') }}"
                        class="hidden md:block text-gray-800 dark:text-white dark:hover:text-green-400 hover:text-green-600 font-medium rounded-lg text-sm px-0.5 md:px-2 lg:px-5 py-2 lg:py-2.5 md:mr-2 focus:outline-none dark:focus:ring-gray-800">
                        Log in
                    </a>
                    <a href="{{ route('register') }}"
                        class="hidden md:block text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-0.5 md:px-2 lg:px-5 py-2 lg:py-2.5 dark:bg-green-500 dark:hover:bg-green-600 focus:outline-none dark:focus:ring-green-700">
                        Register
                    </a>
                @endauth
                <x-cart-button :cart="$cart" />
                <button data-collapse-toggle="navbar" type="button"
                    class="inline-flex items-center p-2 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>
            <div id="navbar" class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1"
                id="mobile-menu-2">
                <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                    @guest
                        <li class="md:hidden flex w-full justify-around gap-3 mb-4">
                            <a href="{{ route('login') }}"
                                class="text-gray-800 dark:text-white dark:hover:text-green-400 hover:text-green-600 font-medium rounded-lg text-sm px-3 md:px-2 lg:px-5 py-2 lg:py-2.5 md:mr-2 focus:outline-none dark:focus:ring-gray-800 border border-green-200 ">
                                Log in
                            </a>
                            <a href="{{ route('register') }}"
                                class="text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-3 md:px-2 lg:px-5 py-2 lg:py-2.5 dark:bg-green-500 dark:hover:bg-green-600 focus:outline-none dark:focus:ring-green-700">
                                Register
                            </a>
                        </li>
                    @endguest
                    <li>
                        <a href="#"
                            class="block py-2 pr-4 pl-3 text-white rounded bg-green-500 lg:bg-transparent lg:text-green-600 lg:p-0 dark:text-white"
                            aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-green-500 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Company</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-green-500 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Marketplace</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-green-500 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Features</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-green-500 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Team</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-green-500 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
