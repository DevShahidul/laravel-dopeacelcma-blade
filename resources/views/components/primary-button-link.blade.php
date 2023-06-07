<a {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center space-x-2 px-4 py-2 bg-purple-600 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:bg-purple-700 focus:shadow-outline-purple dark:bg-purple-200 dark:text-purple-600 dark:hover:bg-white border dark:focus:bg-white dark:active:bg-purple-300 border-transparent rounded-md font-semibold text-sm text-white capitilize tracking-widest transition ease-in-out duration-150']) }}>
    {{ $slot }}
</a>
