<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('CV Shares') }}
        </h2>
        <h3 class="text-gray-300">
            {{ __('Share your resume for others.') }}
        </h3>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden mb-12 shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <livewire:profile.update-profile-shares-form
                            :profile="$profile"
                    />
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <x-header-title
                            title="{{ __('Shares') }}"
                            subtitle="{{ __('Manage your shares.') }}"
                    />

                    <hr class="my-4">
                    <livewire:shares.show
                            :profile="$profile"
                            lazy="on-load"
                    />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
