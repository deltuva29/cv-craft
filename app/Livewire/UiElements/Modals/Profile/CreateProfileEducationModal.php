<?php

namespace App\Livewire\UiElements\Modals\Profile;

use App\Models\Graduation;
use App\Models\Profile;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Illuminate\Contracts\View\View;
use LivewireUI\Modal\ModalComponent;
use Usernotnull\Toast\Concerns\WireToast;

class CreateProfileEducationModal extends ModalComponent implements HasForms
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
        return view('livewire.ui-elements.modals.profile.create-profile-education-modal');
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('graduation_id')
                    ->label(__('Graduation'))
                    ->options(
                        Graduation::all()
                            ->pluck('title', 'id')
                            ->toArray()
                    )
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
                    ->required()
                    ->columnSpan('full'),
            ])->columns()
            ->statePath('data')
            ->model($this->profile);
    }

    public function create(): void
    {
        $this->profile->educations()
            ->create($this->form->getState());
        toast()->success(__('Saved.'))->push();

        $this->closeModal();
        $this->dispatch('profile-updated');
    }
}
