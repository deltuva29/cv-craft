<x-app-layout>
    <x-slot name="header">
        <h2 class="text-gray-300">
            {!! __('You are logged in, <span class="text-white font-bold">:name</span>!', [
                'name' => $user->name
            ]) !!}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center">
                        <div>
                            <x-header-title
                                    title="{{ __('My CV') }}"
                                    subtitle="{{ __('Manage your CV.') }}"
                            />
                        </div>

                        <x-primary-button
                                onclick="Livewire.dispatch('openModal', {
                                    component: 'ui-elements.modals.profile.create-profile-resume-modal',
                                    arguments: {
                                        profile: {{ $profile }}
                                    }
                                })"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-0 md:mr-1">
                                <path fill-rule="evenodd" d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd"/>
                            </svg>
                            <span class="hidden md:block">
                                {{ __('New resume') }}
                            </span>
                        </x-primary-button>
                    </div>

                    <hr class="my-4">
                    <livewire:resumes.show
                            :profile="$profile"
                    />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
