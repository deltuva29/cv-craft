<?php

use App\Models\Profile;
use Livewire\Attributes\On;
use Livewire\Volt\Component;

new class extends Component {
    public Profile $profile;

    public function mount(Profile $profile): void
    {
        $this->profile = $profile;
    }

    #[On('profile-updated')]
    public function updateContacts(): void
    {
        $this->dispatch('$refresh');
    }
}; ?>

<div>
    <div class="bg-gradient-to-r from-white from-40% to-secondary to-280%  dark:bg-gray-800 mb-12 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100 relative">
            <div class="absolute top-6 right-6">
                <x-primary-button
                        onclick="Livewire.dispatch('openModal', {
                                component: 'ui-elements.modals.profile.update-profile-contacts-modal',
                                arguments: { profile: {{ $profile }}
                            }
                        })"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-0 md:mr-1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10"/>
                    </svg>
                    <span class="hidden md:block">
                        {{ __('Edit') }}
                    </span>
                </x-primary-button>
            </div>

            <div class="flex flex-col md:flex-row items-start md:items-start">
                <div class="flex flex-col justify-center items-center mx-auto md:mx-0">
                    <img
                            class="h-32 w-32 rounded-xl my-4 md:my-0 shadow-2xl"
                            src="https://ui-avatars.com/api/?name={{ urlencode($profile->owner->email) }}&color=7F9CF5&background=EFF6FF"
                            alt="{{ $profile->owner->name }}"
                    >
                    <div class="mb-6">
                        <h2 class="block md:hidden font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
                            {{ $profile->owner->name }}
                        </h2>
                    </div>
                </div>
                <div class="flex flex-col md:flex-row items-center md:items-start">
                    <div class="ml-0 md:ml-6">
                        <h2 class="hidden md:block font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
                            {{ $profile->owner->name }}
                        </h2>
                        <div class="font-medium text-lg text-gray-700 dark:text-gray-200 leading-tight">
                            <div class="flex items-center justify-center md:justify-start">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-1">
                                    <path d="M1.5 8.67v8.58a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3V8.67l-8.928 5.493a3 3 0 0 1-3.144 0L1.5 8.67Z"/>
                                    <path d="M22.5 6.908V6.75a3 3 0 0 0-3-3h-15a3 3 0 0 0-3 3v.158l9.714 5.978a1.5 1.5 0 0 0 1.572 0L22.5 6.908Z"/>
                                </svg>
                                <a href="mailto:{{ $profile->owner->email }}"
                                   target="_blank"
                                   rel="noopener noreferrer"
                                   class="flex items-center justify-center md:justify-start text-gray-700 hover:text-secondary hover:underline"
                                >
                                    {{ $profile->owner->email }}
                                </a>
                            </div>
                        </div>
                        @if ($profile->phone)
                            <div class="font-medium text-lg text-gray-700 dark:text-gray-200 leading-tight">
                                <div class="flex items-center justify-start md:justify-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-1">
                                        <path fill-rule="evenodd" d="M1.5 4.5a3 3 0 0 1 3-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 0 1-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 0 0 6.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 0 1 1.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 0 1-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5Z" clip-rule="evenodd"/>
                                    </svg>
                                    <a href="tel:{{ $profile->phone }}"
                                       target="_blank"
                                       rel="noopener noreferrer"
                                       class="flex items-center text-secondary hover:underline"
                                    >
                                        {{ $profile->phone }}
                                    </a>
                                </div>
                            </div>
                        @endif

                        <hr class="my-2">
                        <div class="flex flex-col space-y-1">
                            <div class="font-medium text-md text-gray-700 dark:text-gray-200 leading-tight">
                                <div class="flex items-center justify-start md:justify-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-1">
                                        <path fill-rule="evenodd" d="M7.5 5.25a3 3 0 0 1 3-3h3a3 3 0 0 1 3 3v.205c.933.085 1.857.197 2.774.334 1.454.218 2.476 1.483 2.476 2.917v3.033c0 1.211-.734 2.352-1.936 2.752A24.726 24.726 0 0 1 12 15.75c-2.73 0-5.357-.442-7.814-1.259-1.202-.4-1.936-1.541-1.936-2.752V8.706c0-1.434 1.022-2.7 2.476-2.917A48.814 48.814 0 0 1 7.5 5.455V5.25Zm7.5 0v.09a49.488 49.488 0 0 0-6 0v-.09a1.5 1.5 0 0 1 1.5-1.5h3a1.5 1.5 0 0 1 1.5 1.5Zm-3 8.25a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd"/>
                                        <path d="M3 18.4v-2.796a4.3 4.3 0 0 0 .713.31A26.226 26.226 0 0 0 12 17.25c2.892 0 5.68-.468 8.287-1.335.252-.084.49-.189.713-.311V18.4c0 1.452-1.047 2.728-2.523 2.923-2.12.282-4.282.427-6.477.427a49.19 49.19 0 0 1-6.477-.427C4.047 21.128 3 19.852 3 18.4Z"/>
                                    </svg> {{ $profile->position }}
                                </div>
                            </div>
                            <div class="font-medium text-md text-gray-700 dark:text-gray-200 leading-tight">
                                <div class="flex items-center justify-start md:justify-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-1">
                                        <path fill-rule="evenodd" d="m11.54 22.351.07.04.028.016a.76.76 0 0 0 .723 0l.028-.015.071-.041a16.975 16.975 0 0 0 1.144-.742 19.58 19.58 0 0 0 2.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 0 0-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 0 0 2.682 2.282 16.975 16.975 0 0 0 1.145.742ZM12 13.5a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" clip-rule="evenodd"/>
                                    </svg> {{ $profile->location }}
                                </div>
                            </div>
                            @if ($profile->linkedin)
                                <div class="font-medium text-md leading-tight">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1 text-[#0076B2]" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2zm-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.32 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93zM6.88 8.56a1.68 1.68 0 0 0 1.68-1.68c0-.93-.75-1.69-1.68-1.69a1.69 1.69 0 0 0-1.69 1.69c0 .93.76 1.68 1.69 1.68m1.39 9.94v-8.37H5.5v8.37z"/>
                                        </svg>
                                        <a href="https:://www.linkedin.com/in/{{ $profile->linkedin }}"
                                           target="_blank"
                                           rel="noopener noreferrer"
                                           title="{{ $profile->linkedin }}"
                                           class="flex items-center justify-center md:justify-start text-secondary hover:underline"
                                        >
                                            {{ $profile->linkedin }}
                                        </a>
                                    </div>
                                </div>
                            @endif

                            @if ($profile->website)
                                <div class="font-medium text-md leading-tight">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-1">
                                            <path d="M21.721 12.752a9.711 9.711 0 0 0-.945-5.003 12.754 12.754 0 0 1-4.339 2.708 18.991 18.991 0 0 1-.214 4.772 17.165 17.165 0 0 0 5.498-2.477ZM14.634 15.55a17.324 17.324 0 0 0 .332-4.647c-.952.227-1.945.347-2.966.347-1.021 0-2.014-.12-2.966-.347a17.515 17.515 0 0 0 .332 4.647 17.385 17.385 0 0 0 5.268 0ZM9.772 17.119a18.963 18.963 0 0 0 4.456 0A17.182 17.182 0 0 1 12 21.724a17.18 17.18 0 0 1-2.228-4.605ZM7.777 15.23a18.87 18.87 0 0 1-.214-4.774 12.753 12.753 0 0 1-4.34-2.708 9.711 9.711 0 0 0-.944 5.004 17.165 17.165 0 0 0 5.498 2.477ZM21.356 14.752a9.765 9.765 0 0 1-7.478 6.817 18.64 18.64 0 0 0 1.988-4.718 18.627 18.627 0 0 0 5.49-2.098ZM2.644 14.752c1.682.971 3.53 1.688 5.49 2.099a18.64 18.64 0 0 0 1.988 4.718 9.765 9.765 0 0 1-7.478-6.816ZM13.878 2.43a9.755 9.755 0 0 1 6.116 3.986 11.267 11.267 0 0 1-3.746 2.504 18.63 18.63 0 0 0-2.37-6.49ZM12 2.276a17.152 17.152 0 0 1 2.805 7.121c-.897.23-1.837.353-2.805.353-.968 0-1.908-.122-2.805-.353A17.151 17.151 0 0 1 12 2.276ZM10.122 2.43a18.629 18.629 0 0 0-2.37 6.49 11.266 11.266 0 0 1-3.746-2.504 9.754 9.754 0 0 1 6.116-3.985Z"/>
                                        </svg>
                                        <a href="{{ $profile->website }}"
                                           target="_blank"
                                           rel="noopener noreferrer"
                                           class="flex items-center justify-center md:justify-start text-secondary hover:underline"
                                        >
                                            {{ $profile->website }}
                                        </a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



