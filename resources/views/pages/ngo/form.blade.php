<x-app-layout>
    <x-slot name="header">
        <div class="my-6 flex items-center justify-between">
            <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200">
                {{ __('Ngo') }}
            </h2>
        </div>
        <x-breadcrumb />
    </x-slot>
    <div class="bg-white shadow-md dark:bg-gray-800 rounded-lg p-6">
        <h3 class="mb-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"> Create new Ngo </h3>
        <!-- General elements -->
        <form method="POST" action="{{ route('ngo.store') }}">
            @csrf
        <div class="py-3 grid gap-4 lg:grid-cols-2">
          <div class="block text-sm">
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
          </div>
          <div class="block text-sm">
            <x-input-label for="country_id" :value="__('Country')" />
            <select id="country" name="country_id" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
              <option value="1">Bangladesh</option>
              <option value="2">India</option>
              <option value="3">Pakistan</option>
              <option value="4">Africa</option>
            </select>
          </div>
          <div class="block text-sm">
            <x-input-label for="state_id" :value="__('State')" />
            <select id="state" name="state_id" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
              <option value="1">State 1</option>
              <option value="2">State 2</option>
              <option value="3">State 3</option>
              <option value="4">State 4</option>
            </select>
          </div>
          <div class="block text-sm">
            <x-input-label for="city_id" :value="__('city')" />
            <select id="city" name="city_id" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
              <option value="1">city 1</option>
              <option value="2">city 2</option>
              <option value="3">city 3</option>
              <option value="4">city 4</option>
            </select>
          </div>
          <div class="block text-sm">
            <x-input-label for="zip_code" :value="__('zip_code')" />
            <x-text-input id="zip_code" class="block mt-1 w-full" type="text" name="zip_code" :value="old('zip_code')" required autofocus />
            <x-input-error :messages="$errors->get('zip_code')" class="mt-2" />
          </div>
          <div class="block text-sm">
            <x-input-label for="address" :value="__('address')" />
            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autofocus />
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
          </div>
          <div class="lg:col-span-2">
            <x-primary-button>Create</x-primary-button>
          </div>
        </div>
        </form>
    </div>
</x-app-layout>
