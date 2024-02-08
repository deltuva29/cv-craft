@props([
    'skill' => null,
])
<li {{ $attributes->merge(['class' => 'inline-flex items-center px-2 py-1 me-2 mb-2 text-sm font-medium text-blue-800 bg-tertiary rounded dark:bg-blue-900 dark:text-blue-300']) }}>
    {{ $skill->title }}
</li>
