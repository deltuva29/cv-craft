<?php

use App\Models\Resume;
use Livewire\Volt\Component;

new class extends Component {
    public Resume $resume;

    public function mount(Resume $resume): void
    {
        $this->resume = $resume;
    }
}; ?>

<div>
    <x-slot name="header">
        <h2 class="text-white font-semibold text-xl leading-tight">
            {{ $resume->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <livewire:contacts.show
                    :profile="$profile"
            />

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center">
                        <div>
                            <x-header-title
                                    title="{{ __('Biography') }}"
                                    subtitle="{{ __('Summary about yourself and what you do.') }}"
                            />
                        </div>
                    </div>

                    <hr class="my-4">
                    <livewire:profile.update-profile-bio-form
                            :user="$user"
                    />
                </div>
            </div>

            <hr class="my-2">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center">
                        <div>
                            <x-header-title
                                    title="{{ __('Skills') }}"
                                    subtitle="{{ __('Manage your skills.') }}"
                            />
                        </div>

                        <x-primary-button
                                onclick="Livewire.dispatch('openModal', {
                                    component: 'ui-elements.modals.skill.create-skill-modal',
                                    arguments: {
                                        profile: {{ $profile }}
                                    }
                                })"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-0 md:mr-1">
                                <path fill-rule="evenodd" d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd"/>
                            </svg>
                            <span class="hidden md:block">
                                {{ __('Add skills') }}
                            </span>
                        </x-primary-button>
                    </div>

                    <hr class="my-4">
                    <livewire:skills.show
                            :profile="$profile"
                            lazy="on-load"
                    />
                </div>
            </div>

            <hr class="my-2">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center">
                        <div>
                            <x-header-title
                                    title="{{ __('Experiences') }}"
                                    subtitle="{{ __('Manage your experiences.') }}"
                            />
                        </div>

                        <x-primary-button
                                onclick="Livewire.dispatch('openModal', {
                                    component: 'ui-elements.modals.profile.create-profile-experience-modal',
                                    arguments: {
                                        profile: {{ $profile }}
                                    }
                                })"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-0 md:mr-1">
                                <path fill-rule="evenodd" d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd"/>
                            </svg>
                            <span class="hidden md:block">
                                {{ __('Add experiences') }}
                            </span>
                        </x-primary-button>
                    </div>

                    <hr class="my-4">
                    <livewire:experiences.show
                            :profile="$profile"
                            lazy="on-load"
                    />
                </div>
            </div>

            <hr class="my-2">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center">
                        <div>
                            <x-header-title
                                    title="{{ __('Educations') }}"
                                    subtitle="{{ __('Manage your educations.') }}"
                            />
                        </div>

                        <x-primary-button
                                onclick="Livewire.dispatch('openModal', {
                                    component: 'ui-elements.modals.profile.create-profile-education-modal',
                                    arguments: {
                                        profile: {{ $profile }}
                                    }
                                })"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-0 md:mr-1">
                                <path fill-rule="evenodd" d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd"/>
                            </svg>
                            <span class="hidden md:block">
                                {{ __('Add educations') }}
                            </span>
                        </x-primary-button>
                    </div>

                    <hr class="my-4">
                    <livewire:educations.show
                            :profile="$profile"
                            lazy="on-load"
                    />
                </div>
            </div>

            <hr class="my-2">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center">
                        <div>
                            <x-header-title
                                    title="{{ __('Languages') }}"
                                    subtitle="{{ __('Manage your languages.') }}"
                            />
                        </div>

                        <x-primary-button
                                onclick="Livewire.dispatch('openModal', {
                                    component: 'ui-elements.modals.profile.create-profile-language-modal',
                                    arguments: {
                                        profile: {{ $profile }}
                                    }
                                })"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-0 md:mr-1">
                                <path fill-rule="evenodd" d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd"/>
                            </svg>
                            <span class="hidden md:block">
                                {{ __('Add languages') }}
                            </span>
                        </x-primary-button>
                    </div>

                    <hr class="my-4">
                    <livewire:languages.show
                            :profile="$profile"
                            lazy="on-load"
                    />
                </div>
            </div>

            <hr class="my-2">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center">
                        <div>
                            <x-header-title
                                    title="{{ __('Certificates') }}"
                                    subtitle="{{ __('Manage your certificates.') }}"
                            />
                        </div>

                        <x-primary-button
                                onclick="Livewire.dispatch('openModal', {
                                    component: 'ui-elements.modals.profile.create-profile-certificate-modal',
                                    arguments: {
                                        profile: {{ $profile }}
                                    }
                                })"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-0 md:mr-1">
                                <path fill-rule="evenodd" d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd"/>
                            </svg>
                            <span class="hidden md:block">
                                {{ __('Add certificate') }}
                            </span>
                        </x-primary-button>
                    </div>

                    <hr class="my-4">
                    <livewire:certificates.show
                            :profile="$profile"
                            lazy="on-load"
                    />
                </div>
            </div>
        </div>
    </div>
</div>