<?php

declare(strict_types=1);

namespace App\Livewire\UiElements\Modals\Resume;

use App\Models\Resume;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Illuminate\Contracts\View\View;
use LivewireUI\Modal\ModalComponent;
use Usernotnull\Toast\Concerns\WireToast;

class CreateResumeEducationModal extends ModalComponent implements HasForms
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
            'educations' => $resume->educations->toArray(),
        ]);
    }

    public function render(): View
    {
        return view('livewire.ui-elements.modals.resume.create-resume-education-modal');
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Repeater::make('educations')
                    ->label(__(''))
                    ->relationship()
                    ->schema([
                        Select::make('graduation_id')
                            ->label(__('Graduation'))
                            ->relationship('graduation', 'title')
                            ->required()
                            ->searchable()
                            ->preload(),
                        Select::make('ended_year')
                            ->label(__('Ended year'))
                            ->options(array_combine(range(now()->year, 1900), range(now()->year, 1900)))
                            ->required()
                            ->searchable()
                            ->hidden(fn(Get $get): bool => $get('ended_year') === false),
                        TextInput::make('specialty')
                            ->label(__('Specialty'))
                            ->required()
                            ->suffixIcon('heroicon-m-newspaper'),
                        TextInput::make('institution')
                            ->label(__('Institution'))
                            ->required()
                            ->suffixIcon('heroicon-m-building-office'),
                        MarkdownEditor::make('achievements')
                            ->label(__('Achievements'))
                            ->toolbarButtons([
                                'blockquote',
                                'bold',
                                'bulletList',
                                'italic',
                                'link',
                                'orderedList',
                                'redo',
                                'strike',
                                'undo',
                            ])
                            ->required()->columnSpan('full'),
                    ])->addActionLabel(__('+ Add Education'))
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
