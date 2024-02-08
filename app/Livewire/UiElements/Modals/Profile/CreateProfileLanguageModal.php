<?php

namespace App\Livewire\UiElements\Modals\Profile;

use App\Models\LanguageLevel;
use App\Models\LanguageTitle;
use App\Models\Profile;
use Filament\Forms\Components\Select;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use LivewireUI\Modal\ModalComponent;

class CreateProfileLanguageModal extends ModalComponent implements HasForms
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
        return view('livewire.ui-elements.modals.profile.create-profile-language-modal');
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('language_title_id')
                    ->label(__('Language'))
                    ->options(
                        LanguageTitle::all()
                            ->pluck('title', 'id')
                            ->toArray()
                    )
                    ->required()
                    ->searchable()
                    ->preload(),
                Select::make('language_level_id')
                    ->label(__('Level'))
                    ->options(
                        LanguageLevel::all()
                            ->pluck('title', 'id')
                            ->toArray()
                    )
                    ->required()
                    ->searchable()
                    ->preload(),
            ])->columns()
            ->statePath('data')
            ->model($this->profile);
    }

    public function create(): void
    {
        $this->profile->languages()
            ->create($this->form->getState());

        $this->closeModal();
        $this->dispatch('profile-updated');
    }
}
