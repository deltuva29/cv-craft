@props([
    'language' => null,
])
<div {{ $attributes->merge(['class' => 'text-sm mb-4']) }}>
    <p class="text-gray-700">
        {{ $language->languageTitle->title }} - {{ $language->languageLevel->title }}
    </p>
</div>