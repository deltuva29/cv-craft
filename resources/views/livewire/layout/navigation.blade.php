<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component {
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

<div x-data="{ open: false }"
     @resize.window="open = false"
     @nav.window="open = !open"
>
    <transition
            enter-class="opacity-0"
            enter-active-class="ease-out transition-medium"
            enter-to-class="opacity-100"
            leave-class="opacity-100"
            leave-active-class="ease-out transition-medium"
            leave-to-class="opacity-0"
    >
        <div
                @keydown.escape="open = false"
                x-show="open"
                class="flex z-10 fixed inset-0 transition-opacity overflow-hidden"
        >
            <div
                    @click="open = false, document.body.classList.remove('no-scroll');"
                    class="absolute inset-0 bg-black opacity-40"
                    tabindex="0"
            ></div>
        </div>
    </transition>

    <aside
            class="transform top-0 right-0 w-80 md:w-96 bg-white dark:bg-gray-800 fixed h-full overflow-auto ease-in-out transition-all duration-300 z-30"
            :class="open ? 'translate-x-0' : 'translate-x-full'" x-cloak
    >
        <h2 class="font-semibold text-xl text-primary leading-tight py-4 px-5 text-left mt-2 truncate">
            {{ auth()->user()->full_name ?? '' }}
        </h2>
        <hr class="my-1">

        <div class="mt-3 space-y-1">
            <x-responsive-nav-link
                    :href="route('biography')"
                    @click="open = !open"
                    wire:navigate
            >
                {{ __('Biography') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link
                    :href="route('experiences')"
                    @click="open = !open"
                    wire:navigate
            >
                {{ __('Experiences') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link
                    :href="route('educations')"
                    @click="open = !open"
                    wire:navigate
            >
                {{ __('Educations') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link
                    :href="route('languages')"
                    @click="open = !open"
                    wire:navigate
            >
                {{ __('Languages') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link
                    :href="route('certificates')"
                    @click="open = !open"
                    wire:navigate
            >
                {{ __('Certificates') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link
                    :href="route('shares')"
                    @click="open = !open"
                    wire:navigate
            >
                {{ __('CV Shares') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link
                    :href="route('profile')"
                    @click="open = !open"
                    wire:navigate
                    class="!mb-6"
            >
                {{ __('Profile') }}
            </x-responsive-nav-link>

            <hr class="mt-4">
            <!-- Authentication -->
            <button wire:click="logout" class="w-full text-start">
                <x-responsive-nav-link class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M5 21q-.825 0-1.412-.587T3 19V5q0-.825.588-1.412T5 3h7v2H5v14h7v2zm11-4l-1.375-1.45l2.55-2.55H9v-2h8.175l-2.55-2.55L16 7l5 5z"/>
                    </svg> {{ __('Log Out') }}
                </x-responsive-nav-link>
            </button>
        </div>
    </aside>

    <nav x-data="{ open: false }"
         @nav.window="open = !open"
         class="bg-primary dark:bg-primary border-b border-white dark:border-gray-700"
    >
        <!-- Primary Navigation Menu -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Logo -->
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('dashboard') }}" wire:navigate>
                            <x-application-logo class="block h-9 w-auto fill-current text-white dark:text-white"/>
                        </a>
                    </div>

                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                        <x-nav-link
                                :href="route('dashboard')"
                                :active="request()->routeIs('dashboard')"
                                wire:navigate
                        >
                            {{ __('Dashboard') }}
                        </x-nav-link>
                        <x-nav-link
                                :href="route('biography')"
                                :active="request()->routeIs('biography')"
                                wire:navigate
                        >
                            {{ __('Biography') }}
                        </x-nav-link>
                        <x-nav-link
                                :href="route('experiences')"
                                :active="request()->routeIs('experiences')"
                                wire:navigate
                        >
                            {{ __('Experiences') }}
                        </x-nav-link>
                        <x-nav-link
                                :href="route('educations')"
                                :active="request()->routeIs('educations')"
                                wire:navigate
                        >
                            {{ __('Educations') }}
                        </x-nav-link>
                        <x-nav-link
                                :href="route('languages')"
                                :active="request()->routeIs('languages')"
                                wire:navigate
                        >
                            {{ __('Languages') }}
                        </x-nav-link>
                        <x-nav-link
                                :href="route('shares')"
                                :active="request()->routeIs('shares')"
                                wire:navigate
                        >
                            {{ __('CV Shares') }}
                        </x-nav-link>
                    </div>
                </div>

                <!-- Settings Dropdown -->
                <div class="hidden sm:flex sm:items-center sm:ms-6 group">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button @click="open = !open; $dispatch('nav')" type="button" class="inline-flex group-hover:text-secondary items-center px-3 md:pr-0 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white dark:text-white bg-primary dark:bg-primary hover:text-white dark:hover:text-white focus:outline-none transition ease-in-out duration-150">
                                <div x-data="{{ json_encode(['name' => auth()->user()->name ?? '']) }}"
                                     x-text="name"
                                     x-on:profile-updated.window="name = $event.detail.name"
                                ></div>

                                <div class="ms-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 256 256">
                                        <path fill="currentColor" d="M144 80a8 8 0 0 1 8-8h96a8 8 0 0 1 0 16h-96a8 8 0 0 1-8-8m104 40h-96a8 8 0 0 0 0 16h96a8 8 0 0 0 0-16m0 48h-72a8 8 0 0 0 0 16h72a8 8 0 0 0 0-16m-138.71-26a48 48 0 1 0-58.58 0c-20.62 8.73-36.87 26.3-42.46 48A8 8 0 0 0 16 200h128a8 8 0 0 0 7.75-10c-5.59-21.71-21.84-39.28-42.46-48"/>
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
                    </x-dropdown>
                </div>

                <!-- Hamburger -->
                <div class="-me-2 flex items-center sm:hidden">
                    <button @click="open = !open; $dispatch('nav')" class="inline-flex items-center justify-center p-2 rounded-md text-white dark:text-gray-500 hover:text-secondary dark:hover:text-secondary focus:outline-none focus:bg-none focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 256 256">
                            <path fill="currentColor" d="M144 80a8 8 0 0 1 8-8h96a8 8 0 0 1 0 16h-96a8 8 0 0 1-8-8m104 40h-96a8 8 0 0 0 0 16h96a8 8 0 0 0 0-16m0 48h-72a8 8 0 0 0 0 16h72a8 8 0 0 0 0-16m-138.71-26a48 48 0 1 0-58.58 0c-20.62 8.73-36.87 26.3-42.46 48A8 8 0 0 0 16 200h128a8 8 0 0 0 7.75-10c-5.59-21.71-21.84-39.28-42.46-48"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>
</div>


