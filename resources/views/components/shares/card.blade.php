@props([
    'share' => null,
])
<li {{ $attributes->merge(['class' => 'flex items-center py-4']) }}>
    <div class="flex justify-between w-full">
        <div class="flex items-center"> <!-- Adjusted for alignment -->
            <img
                    class="h-10 w-10 rounded-full"
                    src="https://ui-avatars.com/api/?name={{ urlencode($share->email) }}&color=7F9CF5&background=EFF6FF"
                    alt=""
            >
            <div class="ml-3">
                <p class="text-sm mb-1 font-medium text-gray-900">{{ $share->email }}</p>
                <p class="w-fit bg-blue-100 text-blue-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $share->template }}</p>
            </div>
        </div>
        <div class="flex items-center">
            <a href="{{ route('view.share', $share->token) }}"
               class="inline-flex items-center px-4 py-2 bg-secondary dark:bg-secondary border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-primary/75 dark:hover:bg-white focus:bg-primary/75 dark:focus:bg-primary/75 active:bg-primary/75 dark:active:bg-primary/75 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150" wire:navigate
            >{{ __('Share') }}</a>
        </div>
    </div>
</li>
