<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Certificates') }}
        </h2>
        <h3 class="text-gray-600 dark:text-gray-400">
            {{ __('Add your learned certificates.') }}
        </h3>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
</x-app-layout>
