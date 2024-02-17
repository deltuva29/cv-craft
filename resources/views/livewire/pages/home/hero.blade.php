<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>

<div>
    <div class="relative overflow-hidden px-3">
        <main class="mt-16 mx-auto max-w-4xl px-4">
            <div class="flex flex-col items-center justify-center">
                <h1 class="text-4xl text-center font-mono font-extrabold text-gray-900 dark:text-gray-100 sm:text-7xl">
                    <x-text-reveal>
                        {!! __('Create a new resume with <strong class="text-secondary">:name</strong>!', ['name' => config('app.name')]) !!}
                    </x-text-reveal>
                </h1>
                <p class="mt-4 text-center text-lg text-gray-500 dark:text-gray-400">
                    <x-text-reveal>
                        {!! __('The simplest way to create a new resume.') !!}
                    </x-text-reveal>
                </p>
            </div>

            <div class="my-12">
                <div class="flex flex-col justify-center items-center space-y-2">
                    <x-nav-link
                            :href="route('login')"
                            class="w-full sm:w-1/2 flex justify-center items-center !px-4 !py-4 bg-secondary dark:bg-secondary border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-primary/75 dark:hover:bg-white focus:bg-primary/75 dark:focus:bg-primary/75 active:bg-primary/75 dark:active:bg-primary/75 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
                            wire:navigate
                    >
                        {{ __('Log In') }}
                    </x-nav-link>
                    <x-nav-link
                            :href="route('register')"
                            class="w-full sm:w-1/2 flex justify-center items-center !px-4 !py-4 bg-secondary dark:bg-secondary border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-primary/75 dark:hover:bg-white focus:bg-primary/75 dark:focus:bg-primary/75 active:bg-primary/75 dark:active:bg-primary/75 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
                            wire:navigate
                    >
                        {{ __('Create Account') }}
                    </x-nav-link>
                </div>
            </div>
        </main>
    </div>
</div>
