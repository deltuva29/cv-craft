@props([
    'certificate' => null,
])
<div {{ $attributes->merge(['class' => 'text-sm mb-4']) }}>
    <p class="text-lg font-semibold">{{ $certificate->name }}</p>
    <p class="text-gray-600">Received in {{ $certificate->received_year }}</p>
</div>