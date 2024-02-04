@props(['active'])

@php
    $classes = ($active ?? false)
                ? 'inline-flex items-center px-1 pt-1 border-b-2 border-secondary dark:border-secondary text-sm font-bold leading-5 text-secondary dark:text-secondary focus:outline-none focus:border-secondary transition duration-150 ease-in-out'
                : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-white dark:text-white dark:hover:text-gray-300 hover:border-secondary dark:hover:border-secondary focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-secondary dark:focus:border-secondary transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
