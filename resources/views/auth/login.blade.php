<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <x-slot:image>
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
    </x-slot:image>
        <div class="w-full">
            <form method="POST" action="{{ route('login') }}">
                @csrf
        <h1
            class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200"
        >
            {{ __('Login') }}
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
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-300 border-gray-300 dark:border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <x-primary-button class="mt-4 w-full">
            {{ __('Log in') }}
        </x-primary-button>

        <hr class="my-6" />

        @if (Route::has('password.request'))
        <p>
                <a class="text-sm font-medium text-purple-600 dark:text-gray-400 hover:underline dark:hover:text-gray-100 rounded-md focus:outline-none focus:shadow-none" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            </p>
        @endif
        @if(Route::has('register'))
        <p class="mt-1">
            <a
            class="text-sm font-medium text-purple-600 dark:text-gray-400 hover:underline dark:hover:text-gray-100 rounded-md focus:outline-none focus:shadow-none"
            href="{{ route('register') }}"
            >
            {{ __('Create account') }}
            </a>
        </p>
        @endif
        </form>
    </div>

</x-guest-layout>
