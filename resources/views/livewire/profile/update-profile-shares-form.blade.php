<?php

declare(strict_types=1);

use App\Enums\ShareTemplate;
use App\Mail\ShareRequest;
use App\Models\Profile;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Livewire\Volt\Component;
use Usernotnull\Toast\Concerns\WireToast;

new class extends Component implements HasForms {
    use WireToast;
    use InteractsWithForms;

    public ?array $data = [];

    public Profile $profile;

    public function mount(Profile $profile): void
    {
        $this->profile = $profile;
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('email')
                    ->label(__('Email'))
                    ->required()
                    ->email()
                    ->helperText(__('Your email address will be used to share your profile.'))
                    ->suffixIcon('heroicon-m-envelope'),
                Select::make('resume_id')
                    ->relationship('resume', 'name')
                    ->label(__('Resume'))
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('template')
                    ->label(__('Template'))
                    ->options(ShareTemplate::class)
                    ->helperText(__('Choose a template to share your profile.'))
                    ->required()
            ])
            ->statePath('data')
            ->model($this->profile);
    }


    public function create(): void
    {
        $this->validate();
        $share = $this->profile->shares()->create($this->form->getState());
        Mail::to($this->form->getState()['email'])->send(new ShareRequest($share));

        $this->form->fill();
        toast()->success(__('Saved.'))->push();

        $this->dispatch('profile-updated');
    }

}; ?>

<div>
    <form wire:submit.prevent="create" class="space-y-6">
        {{ $this->form }}

        <div class="flex justify-end items-center gap-4">
            <x-primary-button>
                <span wire:loading.remove wire:click.prevent="create">
                    {{ __('Save') }}
                </span>
                <span wire:loading wire:target="create">
                    <svg aria-hidden="true" class="inline w-4 h-4 mr-0.5 text-gray-200 animate-spin dark:text-white" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="#ffffff"/>
                    </svg> {{ __('Saving..') }}
                </span>
            </x-primary-button>
        </div>
    </form>
</div>
