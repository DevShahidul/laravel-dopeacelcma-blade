<x-guest-layout>
    <x-slot:image>
        <img
            aria-hidden="true"
            class="object-cover w-full h-full dark:hidden"
            src="../assets/img/create-account-office.jpeg"
            alt="Office"
        />
        <img
            aria-hidden="true"
            class="hidden object-cover w-full h-full dark:block"
            src="../assets/img/create-account-office-dark.jpeg"
            alt="Office"
        />
    </x-slot:image>

    <div class="w-full">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <h1
            class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200"
            >
                {{ __('Create account') }}
            </h1>
            <!-- Name -->
            <div class="block text-sm">
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="block mt-4 text-sm">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="block mt-4 text-sm">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="block mt-4 text-sm">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <x-primary-button class="mt-4 w-full">
                {{ __('Register') }}
            </x-primary-button>

            <hr class="my-6" />

            <p class="mt-1">
                <a class="text-sm font-medium text-purple-600 dark:text-gray-400 hover:underline dark:hover:text-gray-100 rounded-md focus:outline-none focus:shadow-none" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
            </p>
        </form>
    </div>
</x-guest-layout>
