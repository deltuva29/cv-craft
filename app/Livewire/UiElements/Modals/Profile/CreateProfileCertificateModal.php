<?php

namespace App\Livewire\UiElements\Modals\Profile;

use App\Models\Profile;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use LivewireUI\Modal\ModalComponent;

class CreateProfileCertificateModal extends ModalComponent implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public string $uuid;

    public Profile $profile;

    public static function modalMaxWidth(): string
    {
        return '2xl';
    }

    public function mount(Profile $profile): void
    {
        $this->profile = $profile;
        $this->form->fill();
    }

    public function render(): View
    {
        return view('livewire.ui-elements.modals.profile.create-profile-certificate-modal');
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label(__('Title'))
                    ->required(),
                Select::make('received_year')
                    ->label(__('Received year'))
                    ->options(array_combine(range(now()->year, 1900), range(now()->year, 1900)))
                    ->required()
                    ->searchable(),
            ])->columns()
            ->statePath('data')
            ->model($this->profile);
    }

    public function create(): void
    {
        $this->profile->certificates()
            ->create($this->form->getState());

        $this->closeModal();
        $this->dispatch('profile-updated');
    }
}
