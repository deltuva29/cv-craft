<?php

declare(strict_types=1);

namespace App\Livewire\UiElements\Modals\Resume;

use App\Models\Resume;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use LivewireUI\Modal\ModalComponent;
use Usernotnull\Toast\Concerns\WireToast;
use Ysfkaya\FilamentPhoneInput\Forms\PhoneInput;

class UpdateResumeContactsModal extends ModalComponent implements HasForms
{
    use WireToast;
    use InteractsWithForms;

    public ?array $data = [];

    public Resume $resume;

    public static function modalMaxWidth(): string
    {
        return '2xl';
    }

    public function mount(Resume $resume): void
    {
        $this->resume = $resume;
        $this->form->fill(
            $this->resume->only([
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
                    ->nullable(),
                TextInput::make('linkedin')
                    ->label(__('LinkedIn URL'))
                    ->suffix('linkedin.com/in/')
                    ->nullable(),
                TextInput::make('website')
                    ->label(__('Website URL'))
                    ->url()
                    ->suffixIcon('heroicon-m-globe-alt')
                    ->nullable(),
            ])
            ->statePath('data')
            ->model($this->resume);
    }

    public function render(): View
    {
        return view('livewire.ui-elements.modals.profile.update-profile-contacts-modal');
    }

    public function save(): void
    {
        $this->resume->update($this->form->getState());
        toast()->success(__('Saved.'))->push();

        $this->closeModal();

        $this->dispatch('profile-updated');
    }
}
