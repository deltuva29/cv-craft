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
                        <x-empty-content
                                title="{{ __('You have not added any educations yet.') }}"
                        />
                    @endif
                    <livewire:profile.update-profile-educations-form
                            :profile="$profile"
                    />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
