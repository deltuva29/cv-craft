@props([
    'experience' => null,
])
<div {{ $attributes->merge(['class' => 'text-sm mb-4']) }}>
    <h3 class="text-lg font-semibold">{{ $experience->jobTitle->name }}, {{ $experience->company->name }}</h3>
    <p class="text-gray-700">{{ $experience->description }}</p>
    <p class="text-gray-600">
        {{ now()->parse($experience->started_at)->format('F Y') }} -
        {{ $experience->ended_at ? now()->parse($experience->ended_at)->format('F Y') : 'Present' }}
    </p>
</div>