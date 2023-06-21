<x-app-layout>
    <x-slot name="header">
        <div class="my-6 flex items-center justify-between">
            <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200">
                {{ __('Ngo') }}
            </h2>
        </div>
        <nav class="flex mb-6" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{route('dashboard')}}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                        {{ __('Dashboard') }}
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <a href="{{ route('ngos.index') }}" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">{{ __('Ngos')}}</a>
                    </div>
                </li>
                <li aria-current="page">
                <div class="flex items-center">
                    <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">{{__('Edit')}}</span>
                </div>
                </li>
            </ol>
        </nav>
    </x-slot>
    <div class="bg-white shadow-md dark:bg-gray-800 rounded-lg p-6">
        <h3 class="mb-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"> Update Ngo </h3>
        <!-- General elements -->
        <form method="POST" action="{{ route('ngos.update', $ngo->id) }}">
            @method("PUT")
            @csrf
        <div class="py-3 grid gap-4 lg:grid-cols-2">
          <div class="block text-sm">
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $ngo->name)" required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
          </div>
          <div class="block text-sm">
            <x-input-label for="country_id" :value="__('Country')" />
            <select id="country" name="country_id" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
              @foreach($countries as $country)
              <option value="{{$country->id}}" {{$country->id == $ngo->country_id ? 'selected' : ''}}>{{$country->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="block text-sm">
            <x-input-label for="state_id" :value="__('State')" />
            <select id="state" name="state_id" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
              @foreach($states as $state)
              <option value="{{$state->id}}" {{$state->id == $ngo->state_id ? 'selected' : ''}}>{{$state->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="block text-sm">
            <x-input-label for="city_id" :value="__('city')" />
            <select id="city" name="city_id" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
              @foreach($cities as $city)
                <option value="{{$city->id}}" {{$city->id == $ngo->city_id ? 'selected' : ''}}>{{$city->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="block text-sm">
            <x-input-label for="zip_code" :value="__('zip_code')" />
            <x-text-input id="zip_code" class="block mt-1 w-full" type="text" name="zip_code" placeholder="2000" :value="old('zip_code', $ngo->zip_code)" required autofocus />
            <x-input-error :messages="$errors->get('zip_code')" class="mt-2" />
          </div>
          <div class="block text-sm">
            <x-input-label for="address" :value="__('address')" />
            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" placeholder="Address 1, address 2" :value="old('address', $ngo->address)" required autofocus />
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
          </div>
          <div class="lg:col-span-2">
            <x-primary-button>Update</x-primary-button>
          </div>
        </div>
        </form>
    </div>
</x-app-layout>
