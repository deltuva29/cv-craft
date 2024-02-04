@props([
    'education' => null,
])
<div {{ $attributes->merge(['class' => 'text-sm mb-4']) }}>
    <h3 class="text-lg font-semibold">{{ $education->graduation->title }}, {{ $education->institution }}</h3>
    <p class="text-gray-700">{{ $education->achievements }}</p>
    <p class="text-gray-600">Graduated in {{ $education->ended_year }}</p>
</div>