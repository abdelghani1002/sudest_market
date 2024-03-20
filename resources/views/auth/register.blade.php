<x-guest-layout>
    <div class="m-2">
        <form id="register-form" method="POST" action="{{ route('register.post') }}">
            @csrf
            @method('POST')
            <div id="errors-list" class=""></div>
            
            <!-- Name -->
            <div class="flex flex-col justify-center">
                <x-input-label for="name" :value="__('Name')" />
                <span class="flex gap-1.5 relative items-center">
                    <span class="absolute pt-1 pl-2">
                        <svg class="w-6 h-6 text-gray-600 dark:text-gray-200" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-width="2"
                                d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                    </span>
                    <x-text-input id="name" class="block mt-1 w-full pl-9" type="text" name="name"
                        :value="old('name')" required autofocus autocomplete="name" />
                </span>
                @if ($errors->has('name'))
                    <x-input-error :messages="$errors->get('name')" class="mt-1" />
                @endif
            </div>

            <!-- Email Address -->
            <div class="flex flex-col justify-center mt-4">
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
                    <x-input-error :messages="$errors->get('email')" class="mt-1" />
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
                    <x-input-error :messages="$errors->get('password')" class="mt-1" />
                @endif
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <span class="flex gap-1.5 relative items-center">
                    <span class="absolute pt-1 pl-2">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M10 5a2 2 0 0 0-2 2v3h2.4A7.48 7.48 0 0 0 8 15.5a7.48 7.48 0 0 0 2.4 5.5H5a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h1V7a4 4 0 1 1 8 0v1.15a7.446 7.446 0 0 0-1.943.685A.999.999 0 0 1 12 8.5V7a2 2 0 0 0-2-2Z"
                                clip-rule="evenodd" />
                            <path fill-rule="evenodd"
                                d="M10 15.5a5.5 5.5 0 1 1 11 0 5.5 5.5 0 0 1-11 0Zm6.5-1.5a1 1 0 1 0-2 0v1.5a1 1 0 0 0 .293.707l1 1a1 1 0 0 0 1.414-1.414l-.707-.707V14Z"
                                clip-rule="evenodd" />
                        </svg>

                    </span>
                    <x-text-input id="password_confirmation" class="block mt-1 w-full pl-9" type="password"
                        name="password_confirmation" required autocomplete="new-password" />
                </span>
                @if ($errors->has('password_confirmation'))
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
                @endif
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                    href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button type='submit' class="ms-4 bg-green-500 text-white hover:bg-green-600">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </div>
    @vite('resources/js/auth/register.js')
</x-guest-layout>
