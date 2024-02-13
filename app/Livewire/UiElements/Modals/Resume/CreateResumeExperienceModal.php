<?php

declare(strict_types=1);

namespace App\Livewire\UiElements\Modals\Resume;

use App\Models\Company;
use App\Models\JobTitle;
use App\Models\Resume;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Illuminate\Contracts\View\View;
use LivewireUI\Modal\ModalComponent;
use Usernotnull\Toast\Concerns\WireToast;

class CreateResumeExperienceModal extends ModalComponent implements HasForms
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
        $this->form->fill();
    }

    public function render(): View
    {
        return view('livewire.ui-elements.modals.profile.create-profile-experience-modal');
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('job_title_id')
                    ->label(__('Job Title'))
                    ->options(
                        JobTitle::query()
                            ->pluck('name', 'id')
                            ->toArray()
                    )
                    ->required()
                    ->searchable()
                    ->preload(),
                Select::make('company_id')
                    ->label(__('Company'))
                    ->options(
                        Company::query()
                            ->pluck('name', 'id')
                            ->toArray()
                    )
                    ->required()
                    ->searchable()
                    ->preload(),
                MarkdownEditor::make('description')
                    ->label(__('Description'))
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
                    ->required()
                    ->columnSpan('full'),
                DatePicker::make('started_at')
                    ->label(__('Started at'))
                    ->requiredWithout('current')->required(),
                DatePicker::make('ended_at')
                    ->label(__('Ended at'))
                    ->hidden(static fn(Get $get): bool => $get('current'))
                    ->requiredWithout('current')->required(static fn(Get $get): bool => !$get('current')),
                Checkbox::make('current')
                    ->label(__('Current'))
                    ->afterStateUpdated(static fn(Set $set, $state) => $set('ended_at', null))
                    ->reactive()
                    ->nullable()
                    ->columnSpan('full'),
            ])->columns()
            ->statePath('data')
            ->model($this->resume);
    }

    public function create(): void
    {
        $this->resume->experiences()
            ->create($this->form->getState());
        toast()->success(__('Saved.'))->push();

        $this->closeModal();
        $this->dispatch('profile-updated');
    }
}
