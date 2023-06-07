<x-app-layout>
    <x-slot name="header">
        <div class="my-6 flex items-center justify-between">
            <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200">
                {{ __('Staff') }}
            </h2>
            <div>
                <x-primary-button-link href="{{ route('staff.create') }}">
                    {{ __('Create New') }}
                </x-primary-button-link>
            </div>
        </div>
    </x-slot>
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        @include('components.table')
        @include('components.pagination')
    </div>
</x-app-layout>
