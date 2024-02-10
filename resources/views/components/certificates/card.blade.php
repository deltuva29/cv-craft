@props([
    'certificate' => null,
])
<div {{ $attributes->merge(['class' => 'text-sm mb-4']) }}>
    <p class="text-lg font-semibold text-secondary">{{ $certificate->name }}</p>
    <time class="block mb-2 text-sm font-normal leading-none text-gray-500">
        {{ __('Received') }} {{ now()->parse($certificate->started_at)->format('Y/m/d') }} - {{ now()->parse($certificate->received_at)->format('Y/m/d') }}
    </time>
    <p class="text-gray-700">{{ $certificate->description }}</p>
</div>