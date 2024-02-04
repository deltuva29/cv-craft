<?php

namespace App\Livewire\UiElements\Modals;

use App\Enums\ShareTemplate;
use App\Models\Profile;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use LivewireUI\Modal\ModalComponent;

class CreateSkillModal extends ModalComponent implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public Profile $profile;

    public function mount(Profile $profile): void
    {
        $this->profile = $profile;
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('email')
                    ->required()
                    ->email()
                    ->helperText('Your email address will be used to share your profile.')
                    ->suffixIcon('heroicon-m-envelope'),
                Select::make('template')
                    ->options(ShareTemplate::class)
                    ->required(),
            ])
            ->statePath('data');
    }

    public function create(): void
    {
        $this->dispatch('profile-updated');
    }

    public function render(): View
    {
        return view('livewire.ui-elements.modals.create-skill-modal');
    }
}
