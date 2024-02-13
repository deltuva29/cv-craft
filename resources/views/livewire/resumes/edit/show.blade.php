<?php

use App\Models\Resume;
use Livewire\Attributes\On;
use Livewire\Volt\Component;

new class extends Component {
    public Resume $resume;

    public function mount(Resume $resume): void
    {
        $this->resume = $resume;
    }

    #[On('resume-updated')]
    public function updateResume(): void
    {
        $this->dispatch('$refresh');
    }
}; ?>

<div>
    <x-slot name="header">
        <h2 class="text-white font-semibold text-xl leading-tight">
            {{ __('Edit resume') }}
        </h2>
        <h3 class="text-gray-300">
            {{ __('Update your resume.') }}
        </h3>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto py-1 px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <div>
                    <h3 class="text-secondary font-semibold text-xl leading-tight truncate">
                        {{ $resume->name }}
                        <x-status-badge
                                :status="$resume->public"
                        />
                        <span class="inline-flex items-center px-2.5 py-1.5 rounded-sm text-sm font-medium bg-blue-100 text-blue-800 uppercase">
                           {{ $resume->language }}
                        </span>
                    </h3>
                </div>

                <x-primary-button
                        onclick="Livewire.dispatch('openModal', {
                                component: 'ui-elements.modals.resume.update-resume-modal',
                                arguments: { resume: {{ $resume->id }}
                            }
                        })"
                        class="!bg-transparent !border-none group !focus-none !p-0"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8 text-primary group-hover:text-secondary transition duration-300 ease-in-out">
                        <path fill-rule="evenodd"
                              d="M11.828 2.25c-.916 0-1.699.663-1.85 1.567l-.091.549a.798.798 0 0 1-.517.608 7.45 7.45 0 0 0-.478.198.798.798 0 0 1-.796-.064l-.453-.324a1.875 1.875 0 0 0-2.416.2l-.243.243a1.875 1.875 0 0 0-.2 2.416l.324.453a.798.798 0 0 1 .064.796 7.448 7.448 0 0 0-.198.478.798.798 0 0 1-.608.517l-.55.092a1.875 1.875 0 0 0-1.566 1.849v.344c0 .916.663 1.699 1.567 1.85l.549.091c.281.047.508.25.608.517.06.162.127.321.198.478a.798.798 0 0 1-.064.796l-.324.453a1.875 1.875 0 0 0 .2 2.416l.243.243c.648.648 1.67.733 2.416.2l.453-.324a.798.798 0 0 1 .796-.064c.157.071.316.137.478.198.267.1.47.327.517.608l.092.55c.15.903.932 1.566 1.849 1.566h.344c.916 0 1.699-.663 1.85-1.567l.091-.549a.798.798 0 0 1 .517-.608 7.52 7.52 0 0 0 .478-.198.798.798 0 0 1 .796.064l.453.324a1.875 1.875 0 0 0 2.416-.2l.243-.243c.648-.648.733-1.67.2-2.416l-.324-.453a.798.798 0 0 1-.064-.796c.071-.157.137-.316.198-.478.1-.267.327-.47.608-.517l.55-.091a1.875 1.875 0 0 0 1.566-1.85v-.344c0-.916-.663-1.699-1.567-1.85l-.549-.091a.798.798 0 0 1-.608-.517 7.507 7.507 0 0 0-.198-.478.798.798 0 0 1 .064-.796l.324-.453a1.875 1.875 0 0 0-.2-2.416l-.243-.243a1.875 1.875 0 0 0-2.416-.2l-.453.324a.798.798 0 0 1-.796.064 7.462 7.462 0 0 0-.478-.198.798.798 0 0 1-.517-.608l-.091-.55a1.875 1.875 0 0 0-1.85-1.566h-.344ZM12 15.75a3.75 3.75 0 1 0 0-7.5 3.75 3.75 0 0 0 0 7.5Z"
                              clip-rule="evenodd"/>
                    </svg>
                </x-primary-button>
            </div>
            <hr class="my-4">

            <livewire:person.show
                    :resume="$resume"
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
                            :resume="$resume"
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
                                         resume: {{ $resume->id }}
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
                            :resume="$resume"
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
                                   component: 'ui-elements.modals.resume.create-resume-experience-modal',
                                   arguments: {
                                           resume: {{ $resume->id }}
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
                            :resume="$resume"
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
                                    component: 'ui-elements.modals.resume.create-resume-education-modal',
                                    arguments: {
                                        resume: {{ $resume->id }}
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
                            :resume="$resume"
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
                                    component: 'ui-elements.modals.resume.create-resume-language-modal',
                                    arguments: {
                                        resume: {{ $resume->id }}
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
                            :resume="$resume"
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
                                    component: 'ui-elements.modals.resume.create-resume-certificate-modal',
                                    arguments: {
                                        resume: {{ $resume }}
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
                            :resume="$resume"
                            lazy="on-load"
                    />
                </div>
            </div>
        </div>
    </div>
</div>