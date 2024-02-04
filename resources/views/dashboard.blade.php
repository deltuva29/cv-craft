<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <h3 class="text-gray-600 dark:text-gray-400">
            {!! __('You are logged in, <span class="text-secondary">:name</span>!', [
                'name' => $user->name
            ]) !!}
        </h3>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center">
                        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                            {{ __('Skills') }}
                        </h2>

                        <x-primary-button
                                onclick="Livewire.dispatch('openModal', {
                                    component: 'ui-elements.modals.create-skill-modal',
                                    arguments: {
                                        profile: {{ $profile }}
                                    }
                                })"
                        >
                            {{ __('+ Add skills') }}
                        </x-primary-button>
                    </div>

                    <hr class="my-4">
                    <x-skills.list-content>
                        @forelse ($profile->skills as $skill)
                            <x-skills.card
                                    :skill="$skill"
                            />
                        @empty
                            <p>-</p>
                        @endforelse
                    </x-skills.list-content>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
