<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Biography') }}
        </h2>
        <h3 class="text-gray-300">
            {{ __('Add your biography.') }}
        </h3>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
        </div>
    </div>
</x-app-layout>
