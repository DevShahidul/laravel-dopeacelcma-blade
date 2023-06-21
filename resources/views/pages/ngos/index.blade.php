<x-app-layout>
    <x-slot name="header">
        <div class="my-6 flex items-center justify-between">
            <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200">
                {{ __('Ngos') }}
            </h2>
            <div>
                <x-primary-button-link href="{{ route('ngos.create') }}">
                    {{ __('Create New') }}
                </x-primary-button-link>
            </div>
        </div>
        <x-auth-session-status class="mt-4" :status="session('message')" />
    </x-slot>
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            @if(! $ngos->isEmpty())

            @php
            if(! $ngos->isEmpty()){
                $dataItem = $ngos->first(); 
                $tableHeaders = array_keys($dataItem->toArray()); 
            }
            @endphp
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-purple-100 dark:text-gray-400 dark:bg-gray-800">
                            @foreach($tableHeaders as $header)
                                <th class="px-4 py-3">{{$header}}</th>
                            @endforeach
                            <th class="px-4 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach($ngos as $Ngo)
                        <tr class="text-gray-700 dark:text-gray-400">
                            @foreach($Ngo->toArray() as $key => $value)
                                <td class="px-4 py-3 text-sm">
                                    {{$Ngo->$key}}
                                </td>
                                @endforeach
                                <td class="px-4 py-3 text-sm">
                                    <div class="flex items-center space-x-2">
                                        <x-primary-button-link :href="route('ngos.edit', $Ngo->id)" class="bg-green-500 dark:bg-green-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                            </svg>
                                        </x-primary-button-link>
                                        <form method="post" action="{{ route('ngos.destroy', $Ngo->id) }}">
                                            @method('DELETE')
                                            @csrf
                                            <x-primary-button type="submit" class="bg-red-500 dark:bg-red-300">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                </svg>
                                            </x-primary-button>
                                        </form>
                                    </div>
                                </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="space-y-5 p-5 transition-all">
                    <div class="space-x-[10px] text-info flex items-center text-gray-400">
                        <figure class="flex items-center justify-center w-6 h-6">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                            </svg>
                        </figure>
                        <p>There are no fields attached to this table.</p>
                    </div>
                    <div class="w-full">
                        <x-primary-button-link href="{{ route('ngos.create') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 16.875h3.375m0 0h3.375m-3.375 0V13.5m0 3.375v3.375M6 10.5h2.25a2.25 2.25 0 002.25-2.25V6a2.25 2.25 0 00-2.25-2.25H6A2.25 2.25 0 003.75 6v2.25A2.25 2.25 0 006 10.5zm0 9.75h2.25A2.25 2.25 0 0010.5 18v-2.25a2.25 2.25 0 00-2.25-2.25H6a2.25 2.25 0 00-2.25 2.25V18A2.25 2.25 0 006 20.25zm9.75-9.75H18a2.25 2.25 0 002.25-2.25V6A2.25 2.25 0 0018 3.75h-2.25A2.25 2.25 0 0013.5 6v2.25a2.25 2.25 0 002.25 2.25z" />
                            </svg>
                            <span>
                                {{ __('Create New') }}
                            </span>
                        </x-primary-button-link>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
