<x-guest-layout>
    <x-slot:image>
        <img
            aria-hidden="true"
            class="object-cover w-full h-full dark:hidden"
            src="../assets/img/forgot-password-office.jpeg"
            alt="Office"
        />
        <img
            aria-hidden="true"
            class="hidden object-cover w-full h-full dark:block"
            src="../assets/img/forgot-password-office-dark.jpeg"
            alt="Office"
        />
    </x-slot:image>

    <div class="w-full">
    <h1
                class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200"
              >
        {{ __('Forgot password') }}
    </h1>

    <p class="mt-4 text-xs mb-4">{{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}</p>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div class="block text-sm">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <x-primary-button class="mt-4 w-full">
            {{ __('Recover password') }}
        </x-primary-button>
    </form>
</x-guest-layout>
