<x-app-layout>
    <x-slot name="header">
        <div class="my-6 flex items-center justify-between">
            <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200">
                {{ __('User') }}
            </h2>
            <div class="flex items-center space-x-4">
                <!-- Search input -->
                <form method="get" action="{{ route('user.index') }}">
                    <div class="flex w-full justify-center">
                        <div class="relative w-full max-w-xl focus-within:text-purple-500">
                            <button class="absolute inset-y-0 flex items-center rounded-tl-md rounded-bl-md p-2 text-white bg-purple-500">
                                <svg
                                class="w-4 h-4"
                                aria-hidden="true"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                                >
                                <path
                                    fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd"
                                ></path>
                                </svg>
                            </button>
                            <input
                                class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input"
                                type="text"
                                placeholder="Search for projects"
                                aria-label="Search"
                            />
                        </div>
                    </div>
                </form>
                <x-primary-button-link href="{{ route('user.create') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                    </svg>
                    <span>
                        {{ __('Create New') }}
                    </span>
                </x-primary-button-link>
            </div>
        </div>
        <x-auth-session-status class="mb-4" :status="session('message')" />
    </x-slot>
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <x-table :tabledata="$users" />
        @include('components.pagination')
    </div>
</x-app-layout>
