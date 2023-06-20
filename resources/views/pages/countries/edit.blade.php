<x-app-layout>
    <x-slot name="header">
        <div class="my-6 flex items-center justify-between">
            <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200">
                {{ __('Country') }}
            </h2>
            <x-primary-button-link :href="route('countries.index')">
                Back
            </x-primary-button-link>
        </div>
        <x-breadcrumb />
    </x-slot>
    <div class="max-w-full mb-6 w-5/12 mx-auto bg-white shadow-md dark:bg-gray-800 rounded-lg p-6">
        <h3 class="mb-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"> {{ __('Update new Country')}} </h3>
        <!-- General elements -->
        <form method="POST" action="{{ route('countries.update', $country->id) }}">
            @method("PUT")
            @csrf
        <!-- Name -->
            <div class="block text-sm">
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $country->name)" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Country code -->
            <div class="block mt-4 text-sm">
                <x-input-label for="code" :value="__('Country Code')" />
                <x-text-input id="code" class="block mt-1 w-full" type="text" name="code" :value="old('code', $country->code)" required autocomplete="code" />
                <x-input-error :messages="$errors->get('code')" class="mt-2" />
            </div>

            <!-- Country phone code -->
            <div class="block mt-4 text-sm">
                <x-input-label for="phonecode" :value="__('Phone Code')" />
                <x-text-input id="phonecode" class="block mt-1 w-full" type="text" name="phonecode" :value="old('phonecode', $country->phonecode)" required autocomplete="phonecode" />
                <x-input-error :messages="$errors->get('phonecode')" class="mt-2" />
            </div>

            <x-primary-button class="mt-4 w-full">
                {{ __('Update') }}
            </x-primary-button>
        </div>
        </form>
    </div>
</x-app-layout>
