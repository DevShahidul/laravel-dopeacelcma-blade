<li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
    <a {{ $attributes->merge(['class' => 'w-full']) }}">
        {{ $slot }}
    </a>
</li>