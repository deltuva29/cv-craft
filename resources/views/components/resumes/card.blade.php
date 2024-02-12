@props([
    'resume' => null,
])

<div class="relative block">
    <span class="absolute right-0 top-0 mt-1">
        <x-status-badge
                :status="$resume->public"
        />
        <span class="inline-flex items-center px-2.5 py-1.5 rounded-sm text-sm font-medium bg-blue-100 text-blue-800 uppercase">
            {{ $resume->language }}
        </span>
    </span>
    <a href="{{ route('resumes.edit.show', $resume) }}"
       class="text-lg font-bold leading-6 text-secondary"
       wire:navigate
    >
        {{ $resume->name }}
    </a>
    <p class="mb-4 text-sm font-normal text-gray-700">
        {{ $resume->description }}
    </p>
</div>
<hr class="my-1">

