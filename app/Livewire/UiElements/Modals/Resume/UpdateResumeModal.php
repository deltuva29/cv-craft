<?php

declare(strict_types=1);

namespace App\Livewire\UiElements\Modals\Resume;

use App\Models\Resume;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use LivewireUI\Modal\ModalComponent;
use Usernotnull\Toast\Concerns\WireToast;

class UpdateResumeModal extends ModalComponent implements HasForms
{
    use WireToast;
    use InteractsWithForms;

    public ?array $data = [];

    public string $uuid;

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
                'name',
                'description',
                'language',
                'public',
            ])
        );
    }

    public function render(): View
    {
        return view('livewire.ui-elements.modals.resume.update-resume-modal');
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Toggle::make('public')
                    ->label(fn($state) => $state ? __('Public') : __('Not-Public'))
                    ->onColor('success')
                    ->required(),
                TextInput::make('name')
                    ->label(__('Title'))
                    ->required(),
                TextInput::make('description')
                    ->label(__('Description'))
                    ->required(),
                Select::make('language')
                    ->label(__('CV Language'))
                    ->prefixIcon('heroicon-s-flag')
                    ->options(
                        config('app.locale_labels')
                    )
                    ->required()
                    ->searchable()
                    ->preload(),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $this->resume->update($this->form->getState());
        toast()->success(__('Saved.'))->push();

        $this->closeModal();
        $this->dispatch('resume-updated');
    }
}
