<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>

<div>
    <div class="relative overflow-hidden px-3" style="background: linear-gradient(90deg, #ECEEF5 0.14%, rgba(236, 238, 245, 0.00) 99.87%);">
        <main class="mt-16 mx-auto max-w-7xl px-4">
            <div class="flex flex-col items-center justify-center">
                <h1 class="text-3xl text-center font-mono font-extrabold text-gray-900 dark:text-gray-100 sm:text-7xl">
                    <x-text-reveal>
                        {!! __('Find your next <strong class="text-secondary">:job</strong>!', ['job' => __('job')]) !!}
                    </x-text-reveal>
                </h1>
                <p class="mt-4 text-center text-lg text-gray-500 dark:text-gray-400">
                    <x-text-reveal>
                        {!! __('“LaraJobs is our first stop whenever we\'re hiring a Laravel role. We\'ve hired 10 Laravel developers in the last few years, all thanks to LaraJobs.” — Matthew Hall, ArborXR') !!}
                    </x-text-reveal>
                </p>
            </div>
        </main>
    </div>
</div>
