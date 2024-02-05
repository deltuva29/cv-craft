<?php

namespace App\Livewire\UiElements\Modals\Profile;

use App\Models\Profile;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use LivewireUI\Modal\ModalComponent;
use Ysfkaya\FilamentPhoneInput\Forms\PhoneInput;

class UpdateProfileContactsModal extends ModalComponent implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public Profile $profile;

    public static function modalMaxWidth(): string
    {
        return '2xl';
    }

    public function mount(Profile $profile): void
    {
        $this->profile = $profile;
        $this->form->fill(
            $this->profile->only([
                'position',
                'location',
                'phone',
                'linkedin',
                'website',
            ])
        );
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('position')
                    ->label(__('Position'))
                    ->required(),
                TextInput::make('location')
                    ->label(__('Location'))
                    ->required(),
                PhoneInput::make('phone')
                    ->label(__('Phone number'))
                    ->initialCountry('lt')
                    ->inlineSuffix('+370')
                    ->nullable(),
                TextInput::make('linkedin')
                    ->label(__('LinkedIn URL'))
                    ->suffix('linkedin.com/in/')
                    ->nullable(),
                TextInput::make('website')
                    ->label(__('Website URL'))
                    ->url('https://')
                    ->suffixIcon('heroicon-m-globe-alt')
                    ->nullable(),
            ])
            ->statePath('data')
            ->model($this->profile);
    }

    public function render(): View
    {
        return view('livewire.ui-elements.modals.profile.update-profile-contacts-modal');
    }

    public function save(): void
    {
        $this->profile->update($this->form->getState());
        $this->closeModal();
        $this->dispatch('profile-updated');
    }
}
