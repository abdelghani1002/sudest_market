<x-guest-layout>
    <div class="m-2">
        <form id="login-form" method="POST" action="{{ route('login.post') }}" class="">
            @csrf
            @method('POST')
            <div id="errors-list" class=""></div>
            <!-- Email Address -->
            <div class="flex flex-col justify-center">
                <x-input-label for="email" :value="__('Email')" />
                <span class="flex gap-1.5 relative items-center">
                    <span class="absolute pt-1 pl-2">
                        <svg class="w-6 h-6 text-gray-600 dark:text-gray-200" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                d="m3.5 5.5 7.893 6.036a1 1 0 0 0 1.214 0L20.5 5.5M4 19h16a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Z" />
                        </svg>
                    </span>
                    <x-text-input id="email" class="block mt-1 w-full pl-9" type="email" name="email"
                        :value="old('email')" required autofocus autocomplete="username" />
                </span>
                @if ($errors->has('email'))
                    <x-input-error :messages="$errors->first('email')" class="mt-2" />
                @endif
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <span class="flex gap-1.5 relative items-center">
                    <span class="absolute pt-1 pl-2">
                        <svg class="w-6 h-6 text-gray-600 dark:text-gray-200" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M8 10V7a4 4 0 1 1 8 0v3h1a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h1Zm2-3a2 2 0 1 1 4 0v3h-4V7Zm2 6a1 1 0 0 1 1 1v3a1 1 0 1 1-2 0v-3a1 1 0 0 1 1-1Z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                    <x-text-input id="password" class="block mt-1 w-full pl-9" type="password" name="password" required
                        autocomplete="current-password" />
                </span>
                @if ($errors->has('password'))
                    <x-input-error :messages="$errors->first('password')" class="mt-2" />
                @endif
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button type="submit" class="ms-3 bg-green-500 text-white hover:bg-green-600">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>

            <div class="flex items-center justify-center mt-4 border-t border-green-300 pt-4">
                <span class="ms-3 text-green-500 hover:font-semibold">
                    <a class="text-md rounded-md" href="{{ route('register') }}">
                        {{ __('Create new account') }}
                    </a>
                </span>
            </div>
        </form>
    </div>
    @vite('resources/js/auth/login.js')
</x-guest-layout>
