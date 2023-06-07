<x-app-layout>
    <x-slot name="header">
        <div class="my-6 flex items-center justify-between">
            <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200">
                {{ __('Ngo') }}
            </h2>
        </div>
    </x-slot>
    <div class="bg-white shadow-md dark:bg-gray-800 rounded-lg p-6">
        <h3 class="mb-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"> Create new Ngo </h3>


        <!-- General elements -->
        <form method="POST" action="{{ route('login') }}">
            @csrf
        <div class="py-3 mb-8">
          <div class="block mt-4 text-sm">
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
          </div>

          <div class="block mt-4 text-sm">
            <label for="country" class="text-gray-700 dark:text-gray-400">
              Requested Limit
            </label>
            <select id="country" name="country" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
              <option>$1,000</option>
              <option>$5,000</option>
              <option>$10,000</option>
              <option>$25,000</option>
            </select>
          </div>

          <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">Message</span>
            <textarea
              class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
              rows="3"
              placeholder="Enter some long form content."
            ></textarea>
          </label>

          <div class="flex mt-6 text-sm">
            <label class="flex items-center dark:text-gray-400">
              <input
                type="checkbox"
                class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
              />
              <span class="ml-2">
                I agree to the
                <span class="underline">privacy policy</span>
              </span>
            </label>
          </div>
        </div>
        </form>
    </div>
</x-app-layout>
