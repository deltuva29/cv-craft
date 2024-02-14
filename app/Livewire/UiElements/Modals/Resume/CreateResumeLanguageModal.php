<?php

declare(strict_types=1);

namespace App\Livewire\UiElements\Modals\Resume;

use App\Models\Resume;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use LivewireUI\Modal\ModalComponent;
use Usernotnull\Toast\Concerns\WireToast;

class CreateResumeLanguageModal extends ModalComponent implements HasForms
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
        $this->form->fill([
            'languages' => $resume->languages->toArray(),
        ]);
    }

    public function render(): View
    {
        return view('livewire.ui-elements.modals.resume.create-resume-language-modal');
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Repeater::make('languages')
                    ->label(__(''))
                    ->relationship()
                    ->schema([
                        Select::make('language_title_id')
                            ->label(__('Language'))
                            ->relationship('languageTitle', 'title')
                            ->required()
                            ->searchable()
                            ->preload(),
                        Select::make('language_level_id')
                            ->label(__('Level'))
                            ->relationship('languageLevel', 'title')
                            ->required()
                            ->searchable()
                            ->preload(),
                    ])->addActionLabel(__('+ Add Languages'))
                    ->columns()
                    ->reorderable()
                    ->reorderableWithButtons(),
            ])
            ->statePath('data')
            ->model($this->resume);
    }

    public function create(): void
    {
        $this->form->getState();
        toast()->success(__('Saved.'))->push();

        $this->closeModal();
        $this->dispatch('resume-updated');
    }
}
