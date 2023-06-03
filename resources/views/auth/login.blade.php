<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="h-32 md:h-auto md:w-1/2">
        <img
        aria-hidden="true"
        class="object-cover w-full h-full dark:hidden"
        src="../assets/img/login-office.jpeg"
        alt="Office"
        />
        <img
        aria-hidden="true"
        class="hidden object-cover w-full h-full dark:block"
        src="../assets/img/login-office-dark.jpeg"
        alt="Office"
        />
    </div>
    <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
        <div class="w-full">
            <form method="POST" action="{{ route('login') }}">
                @csrf
        <h1
            class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200"
        >
            Login
        </h1>
        <div class="block text-sm">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <div class="block mt-4 text-sm">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                type="password"
                name="password"
                required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="block mt-4 text-sm">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <!-- You should use a button here, as the anchor is only used for the example  -->
        {{-- <button type="submit"
            class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
        >
            Log in
        </button> --}}
        <x-primary-button class="ml-3 w-full">
            {{ __('Log in') }}
        </x-primary-button>

        <hr class="my-8" />

        <p class="mt-4">
            @if (Route::has('password.request'))
                <a class="hover:underline text-sm font-medium text-purple-600 dark:text-gray-400 hover:text-purple-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </p>
        <p class="mt-1">
            <a
            class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline"
            href="./create-account.html"
            >
            Create account
            </a>
        </p>
            </form>
        </div>
    </div>

</x-guest-layout>
