@props([
    'title' => null,
    'subtitle' => null
])
<h2 {{ $attributes->merge(['class' => 'font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight']) }}>
    {{ $title }}
</h2>

@unless(empty($subtitle))
    <h3 class="text-gray-600 dark:text-gray-400">
        {{ $subtitle }}
    </h3>
@endunless