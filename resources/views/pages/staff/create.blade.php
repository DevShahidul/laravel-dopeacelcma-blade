<x-app-layout>
    <x-slot name="header">
        <div class="my-6 flex items-center justify-between">
            <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200">
              {{ __('Staff Center') }}
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
                        <a href="{{ route('staff.index') }}" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">{{ __('Staff Center') }}</a>
                    </div>
                </li>
                <li aria-current="page">
                <div class="flex items-center">
                    <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">{{__('Create')}}</span>
                </div>
                </li>
            </ol>
        </nav>
    </x-slot>
    <div class="bg-white shadow-md dark:bg-gray-800 rounded-lg p-6">
        <h3 class="mb-6 capitalize text-2xl font-semibold text-gray-700 dark:text-gray-200"> Create new Staff </h3>
        <!-- General elements -->
        <form method="POST" action="{{ route('staff.store') }}">
            @csrf
        <div class="py-3 grid gap-4 lg:grid-cols-2">
          <div class="block text-sm">
            <x-input-label for="phone" :value="__('Phone')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autofocus />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
          </div>
          <div class="block text-sm">
            <x-input-label for="country_id" :value="__('Country')" />
            <select id="country" name="country_id" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
              <option selected>Select country</option>
              @foreach($countries as $country)
              <option value="{{$country->id}}">{{$country->name}}</option>
              @endforeach
            </select>
            <x-input-error :messages="$errors->get('country_id')" class="mt-2" />
          </div>
          <div class="block text-sm">
            <x-input-label for="state_id" :value="__('State')" />
            <select id="state" name="state_id" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
              <option selected>Select state</option>
              @foreach($states as $state)
              <option value="{{$state->id}}">{{$state->name}}</option>
              @endforeach
            </select>
            <x-input-error :messages="$errors->get('state_id')" class="mt-2" />
          </div>
          <div class="block text-sm">
            <x-input-label for="city_id" :value="__('city')" />
            <select id="city" name="city_id" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
              <option selected>Select city</option>
              @foreach($cities as $city)
                <option value="{{$city->id}}">{{$city->name}}</option>
              @endforeach
            </select>
            <x-input-error :messages="$errors->get('city_id')" class="mt-2" />
          </div>
          <div class="block text-sm">
            <x-input-label for="zip_code" :value="__('Zip code')" />
            <x-text-input id="zip_code" class="block mt-1 w-full" type="text" name="zip_code" placeholder="2000" :value="old('zip_code')" required autofocus />
            <x-input-error :messages="$errors->get('zip_code')" class="mt-2" />
          </div>
          <div class="block text-sm">
            <x-input-label for="address" :value="__('Address')" />
            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" placeholder="Address 1, address 2" :value="old('address')" required autofocus />
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
          </div>
          <div class="block text-sm">
            <x-input-label for="ngo_id" :value="__('NGO')" />
            <select id="ngo" name="ngo_id" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
              <option selected>Select NGO</option>
              @foreach($ngos as $ngo)
                <option value="{{$ngo->id}}">{{$ngo->name}}</option>
              @endforeach
            </select>
            <x-input-error :messages="$errors->get('ngo_id')" class="mt-2" />
          </div>
          <div class="block text-sm">
            <x-input-label for="designation_id" :value="__('Designation')" />
            <select id="designation_id" name="designation_id" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                <option selected>Select designation</option>
                @foreach($designations as $designation)
                <option value="{{$designation->id}}">{{$designation->name}}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('designation_id')" class="mt-2" />
          </div>
          <div class="block text-sm">
            <x-input-label for="user_id" :value="__('User')" />
            <select id="user_id" name="user_id" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                <option selected>Select user</option>
                @foreach($users as $user)
                  <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('user_id')" class="mt-2" />
          </div>
          <div class="block text-sm">
            <x-input-label for="facebook_url" :value="__('Facebook profile url')" />
            <x-text-input id="facebook_url" class="block mt-1 w-full" type="text" name="facebook_url" placeholder="https://www.facebook.com/xxxx" :value="old('facebook_url')" required autofocus />
            <x-input-error :messages="$errors->get('facebook_url')" class="mt-2" />
          </div>
          <div class="block text-sm">
            <x-input-label for="whatsapp_number" :value="__('WhatsApp number')" />
            <x-text-input id="whatsapp_number" class="block mt-1 w-full" type="text" name="whatsapp_number" placeholder="xxxxxxxx" :value="old('whatsapp_number')" required autofocus />
            <x-input-error :messages="$errors->get('whatsapp_number')" class="mt-2" />
          </div>
          <div class="lg:col-span-2">
            <x-primary-button>Create</x-primary-button>
          </div>
        </div>
        </form>
    </div>
</x-app-layout>
