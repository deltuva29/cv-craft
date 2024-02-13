<?php

declare(strict_types=1);

use App\Http\Requests\Profile\UpdateProfileAvatarRequest;
use App\Models\Person;
use App\Models\Profile;
use App\Models\Resume;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use Usernotnull\Toast\Concerns\WireToast;

new class extends Component {
    use WireToast;
    use WithFileUploads;

    public Resume $resume;
    public ?Person $person = null;

    public $avatar;

    public function mount(Resume $resume): void
    {
        $this->resume = $resume;
        $this->person = $resume->person;
    }

    public function rules(): array
    {
        return (new UpdateProfileAvatarRequest())
            ->rules();
    }

    public function updatedAvatar(): void
    {
        $this->validate();

        try {
            if ($this->avatar) {
                $fileName = strtolower(str_replace(['#', '/', '\\', ' '], '-', $this->avatar->getFilename()));
                $this->person->clearMediaCollection('avatar');
                $sanitizeFileName = static fn($fileName) => strtolower(str_replace(['#', '/', '\\', ' '], '-', $fileName));

                $this->person->addMediaFromStream($this->avatar->get())
                    ->sanitizingFileName($sanitizeFileName)
                    ->usingFileName($fileName)
                    ->toMediaCollection('avatar', 'avatars');

                toast()->success(__('Updated.'))->push();
            }
        } catch (Exception $ex) {
            session()->flash('error', $ex->getMessage());
        }
    }

    public function removeAvatar(): void
    {
        try {
            if ($this->person && $this->person->hasMedia('avatar')) {
                $this->person->clearMediaCollection('avatar');

                toast()->success(__('Removed.'))->push();
            }
        } catch (Exception $ex) {
            session()->flash('error', $ex->getMessage());
        }
    }

    #[On('profile-updated')]
    public function updateContacts(): void
    {
        $this->dispatch('$refresh');
    }
}; ?>

<div>
    <div class="bg-white dark:bg-gray-800 mb-6 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100 relative">
            <div class="absolute top-6 right-6">
                <x-primary-button
                        onclick="Livewire.dispatch('openModal', {
                                component: 'ui-elements.modals.resume.update-resume-contacts-modal',
                                arguments: { person: {{ $this->person->id ?? '' }}
                            }
                        })"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-0 md:mr-1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10"/>
                    </svg>
                    <span class="hidden md:block">
                        {{ __('Edit') }}
                    </span>
                </x-primary-button>
            </div>

            <div class="flex flex-col md:flex-row items-start md:items-start">
                <div class="flex flex-col justify-center items-center mx-auto md:mx-0">
                    <div class="relative">
                        @if ($this->person && $this->person->hasMedia('avatar'))
                            <x-secondary-button
                                    wire:click.prevent="removeAvatar"
                                    class="!absolute !top-0 md:!-top-2 !-right-2 !bg-secondary !p-1 !rounded-lg !shadow-md !border-none !cursor-pointer"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/>
                                </svg>
                            </x-secondary-button>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" class="absolute top-0 md:-top-2 -right-2 bg-secondary h-8 w-8 text-white p-1 rounded-lg shadow-md cursor-pointer" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                            </svg>
                            <input wire:model="avatar" type="file" name="avatar" class="absolute -top-[0.5rem] -right-[15rem] opacity-0 cursor-pointer">
                        @endif

                        <img
                                class="w-32 h-32 object-cover rounded-xl my-4 md:my-0 shadow-2xl"
                                src="{{ optional($this->person)->getAvatar() ?? asset('images/default-avatar.png') }}"
                                alt="{{ $resume->owner->full_name }}"
                        >
                    </div>
                    <div class="mb-6">
                        <h2 class="block md:hidden font-semibold text-2xl text-primary dark:text-gray-200 leading-tight truncate">
                            {{ $resume->owner->full_name }}
                        </h2>
                    </div>
                </div>
                <div class="flex flex-col md:flex-row items-center md:items-start">
                    <div class="ml-0 md:ml-9">
                        <h2 class="hidden md:block font-semibold text-2xl text-primary dark:text-gray-200 leading-tight truncate">
                            {{ $resume->owner->full_name }}
                        </h2>
                        <div class="font-medium text-lg text-gray-700 dark:text-gray-200 leading-tight">
                            <div class="flex items-center justify-start md:justify-start">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-1">
                                    <path d="M1.5 8.67v8.58a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3V8.67l-8.928 5.493a3 3 0 0 1-3.144 0L1.5 8.67Z"/>
                                    <path d="M22.5 6.908V6.75a3 3 0 0 0-3-3h-15a3 3 0 0 0-3 3v.158l9.714 5.978a1.5 1.5 0 0 0 1.572 0L22.5 6.908Z"/>
                                </svg>
                                <a href="mailto:{{ $resume->owner->email }}"
                                   target="_blank"
                                   rel="noopener noreferrer"
                                   class="flex items-center justify-center md:justify-start text-gray-700 hover:text-secondary hover:underline truncate"
                                >
                                    {{ $resume->owner->email }}
                                </a>
                            </div>
                        </div>
                        {{--                        <div class="font-medium text-lg text-gray-700 dark:text-gray-200 leading-tight">--}}
                        {{--                            <div class="flex items-center justify-start md:justify-start">--}}
                        {{--                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-1">--}}
                        {{--                                    <path fill-rule="evenodd" d="M1.5 4.5a3 3 0 0 1 3-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 0 1-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 0 0 6.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 0 1 1.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 0 1-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5Z" clip-rule="evenodd"/>--}}
                        {{--                                </svg>--}}
                        {{--                                <a href="tel:{{ $this->person->phone ?? '-' }}"--}}
                        {{--                                   target="_blank"--}}
                        {{--                                   rel="noopener noreferrer"--}}
                        {{--                                   class="flex items-center text-secondary hover:underline"--}}
                        {{--                                >--}}
                        {{--                                    {{ $this->person->phone ?? '-' }}--}}
                        {{--                                </a>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}

                        <hr class="my-2">
                        <div class="flex flex-col space-y-1">
                            .....
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



