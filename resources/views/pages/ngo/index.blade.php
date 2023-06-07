<x-app-layout>
    <x-slot name="header">
        <div class="my-6 flex items-center justify-between">
            <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200">
                {{ __('Ngos') }}
            </h2>
            <div>
                <x-primary-button-link href="{{ route('ngo.create') }}">
                    {{ __('Create New') }}
                </x-primary-button-link>
            </div>
        </div>
        <x-auth-session-status class="mt-4" :status="session('message')" />
    </x-slot>
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <x-table :tabledata="$ngos" />
        @include('components.pagination')
    </div>
</x-app-layout>
