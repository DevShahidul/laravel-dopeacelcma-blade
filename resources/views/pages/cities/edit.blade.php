<x-app-layout>
    <x-slot name="header">
        <div class="my-6 flex items-center justify-between">
            <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200">
                {{ __('City') }}
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
                        <a href="{{ route('cities.index') }}" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">{{ __('Cities')}}</a>
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
    <div class="max-w-full mb-6 w-5/12 mx-auto bg-white shadow-md dark:bg-gray-800 rounded-lg p-6">
        <h3 class="mb-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"> {{ __('Update City')}} </h3>
        <!-- General elements -->
        <form method="POST" action="{{ route('cities.update', $city->id) }}">
            @method("PUT")
            @csrf
            <!-- Country code -->
            <div class="block text-sm">
                <x-input-label for="code" :value="__('State name')" />
                <select id="state_id" aria-label="Select country"  name="state_id" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" >
                    @foreach($states as $state)
                        <option value="{{ $state->id }}" {{ $state->id == $state->state_id ? 'selected' : ''}} >{{$state->name}}</option>
                    @endforeach
                </select>
                @error('state_id')
                    <x-input-error :messages="$errors->get('state_id')" class="mt-2" />
                @enderror
            </div>

            <!-- Name -->
            <div class="block mt-4 text-sm">
                <x-input-label for="name" :value="__('City Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $city->name)" required />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <x-primary-button class="mt-4 w-full">
                {{ __('Update') }}
            </x-primary-button>
        </div>
        </form>
    </div>
</x-app-layout>
