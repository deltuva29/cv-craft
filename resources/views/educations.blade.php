<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Educations') }}
        </h2>
        <h3 class="text-gray-600 dark:text-gray-400">
            {{ __('Add your educational background.') }}
        </h3>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if ($profile->educations->isEmpty())
                        <div x-data="{ empty: false }">
                            <div
                                    @profile-updated.window="empty = true"
                                    x-show="!empty"
                                    x-cloak
                            >
                                <x-empty-content
                                        title="{{ __('You have not added any educations yet.') }}"
                                        class="mb-6"
                                />
                            </div>
                        </div>
                    @endif

                    <div class="flex justify-between items-center">
                        <div>
                            <x-header-title
                                    title="{{ __('Educations') }}"
                                    subtitle="{{ __('Manage your educations.') }}"
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
                                {{ __('Add educations') }}
                            </span>
                        </x-primary-button>
                    </div>

                    <hr class="my-4">
                    <livewire:profile.update-profile-educations-form
                            :profile="$profile"
                    />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
