@props([
    'title' => null
])
<div {{ $attributes->merge(['class' => 'w-full p-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400']) }} role="alert">
    <p>{{ $title }}</p>
</div>