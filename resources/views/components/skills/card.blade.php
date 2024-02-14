@props([
    'skill' => null,
])
<li {{ $attributes->merge(['class' => 'inline-flex items-center px-2 py-1 me-2 mb-2 text-sm font-medium text-primary bg-green-200 rounded dark:bg-blue-900 dark:text-blue-300']) }}>
    {{ $skill->title }}
</li>
