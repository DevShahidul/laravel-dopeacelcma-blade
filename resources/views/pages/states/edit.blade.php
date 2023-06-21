<x-app-layout>
    <x-slot name="header">
        <div class="my-6 flex items-center justify-between">
            <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200">
                {{ __('State') }}
            </h2>
        </div>
        <x-breadcrumb />
    </x-slot>
    <div class="max-w-full mb-6 w-5/12 mx-auto bg-white shadow-md dark:bg-gray-800 rounded-lg p-6">
        <h3 class="mb-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"> {{ __('Create new State')}} </h3>
        <!-- General elements -->
        <form method="POST" action="{{ route('states.update', $state->id) }}">
            @method("PUT")
            @csrf
            <!-- Country code -->
            <div class="block text-sm">
                <x-input-label for="code" :value="__('Country Code')" />
                <select id="country_id" aria-label="Select country"  name="country_id" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" >
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}" {{ $country->id == $state->country_id ? 'selected' : ''}} >{{$country->name}}</option>
                    @endforeach
                </select>
                @error('country_id')
                    <x-input-error :messages="$errors->get('country_id')" class="mt-2" />
                @enderror
            </div>

            <!-- Name -->
            <div class="block mt-4 text-sm">
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $state->name)" required />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <x-primary-button class="mt-4 w-full">
                {{ __('Update') }}
            </x-primary-button>
        </div>
        </form>
    </div>
</x-app-layout>
