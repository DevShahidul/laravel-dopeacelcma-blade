<header class="z-10 py-4 bg-white shadow-md dark:bg-gray-800">
    <div
    class="container flex items-center justify-between h-full px-6 mx-auto text-purple-600 dark:text-purple-300"
    >
    <!-- Mobile hamburger -->
    <button
        class="p-1 mr-5 -ml-1 rounded-md md:hidden focus:outline-none focus:shadow-outline-purple"
        @click="toggleSideMenu"
        aria-label="Menu"
    >
        <svg
        class="w-6 h-6"
        aria-hidden="true"
        fill="currentColor"
        viewBox="0 0 20 20"
        >
        <path
            fill-rule="evenodd"
            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
            clip-rule="evenodd"
        ></path>
        </svg>
    </button>
    
    <ul class="flex items-center flex-shrink-0 space-x-6 ml-auto">
        <!-- Profile menu -->
        <li class="relative">
        <button
            class="inline-flex items-center align-middle rounded-full focus:shadow-outline-purple focus:outline-none"
            @click="toggleProfileMenu"
            @keydown.escape="closeProfileMenu"
            aria-label="Account"
            aria-haspopup="true"
        >
            <div class="text-sm leading-4 font-medium text-gray-500 dark:text-gray-400 mr-2">{{ Auth::user()->name }}</div>
            <img
            class="object-cover w-8 h-8 rounded-full"
            src="https://images.unsplash.com/photo-1502378735452-bc7d86632805?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&s=aa3a807e1bbdfd4364d1f449eaa96d82"
            alt=""
            aria-hidden="true"
            />
        </button>
        <template x-if="isProfileMenuOpen">
            <ul
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            @click.away="closeProfileMenu"
            @keydown.escape="closeProfileMenu"
            class="absolute right-0 w-40 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:border-gray-700 dark:text-gray-300 dark:bg-gray-700"
            aria-label="submenu"
            >
            <li class="flex">
                <x-dropdown-link :href="route('profile.edit')">
                    <x-slot name="icon">
                        <svg
                        class="w-4 h-4 mr-3"
                        aria-hidden="true"
                        fill="none"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        >
                            <path
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                            ></path>
                        </svg>
                    </x-slot>
                    <span>{{ __('Profile') }}</span>
                </x-dropdown-link>
            </li>
            <li class="flex">


                <!-- Authentication -->
                <form class="w-full" method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                        <x-slot name="icon">
                                        <svg
                    class="w-4 h-4 mr-3"
                    aria-hidden="true"
                    fill="none"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path
                    d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"
                    ></path>
                </svg>
                                        </x-slot>
                        <span>{{ __('Log Out') }}</span>
                    </x-dropdown-link>
                </form>
            </li>
            </ul>
        </template>
        </li>
    </ul>
    </div>
</header>
