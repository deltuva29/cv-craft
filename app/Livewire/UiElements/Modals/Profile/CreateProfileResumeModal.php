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
use Usernotnull\Toast\Concerns\WireToast;

class CreateProfileResumeModal extends ModalComponent implements HasForms
{
    use WireToast;
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
        return view('livewire.ui-elements.modals.profile.create-profile-resume-modal');
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label(__('Title'))
                    ->required(),
                TextInput::make('description')
                    ->label(__('Description'))
                    ->required(),
                Select::make('language')
                    ->label(__('Language'))
                    ->prefixIcon('heroicon-s-flag')
                    ->options(
                        config('app.locale_labels')
                    )
                    ->required()
                    ->searchable()
                    ->preload(),
            ])
            ->statePath('data')
            ->model($this->profile);
    }

    public function create(): void
    {
        $this->profile->resumes()
            ->create($this->form->getState());
        toast()->success(__('Saved.'))->push();

        $this->closeModal();
        $this->dispatch('profile-updated');
    }
}
