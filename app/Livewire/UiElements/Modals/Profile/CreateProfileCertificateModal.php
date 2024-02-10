<?php

namespace App\Livewire\UiElements\Modals\Profile;

use App\Models\Profile;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use LivewireUI\Modal\ModalComponent;
use Usernotnull\Toast\Concerns\WireToast;

class CreateProfileCertificateModal extends ModalComponent implements HasForms
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
        return view('livewire.ui-elements.modals.profile.create-profile-certificate-modal');
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label(__('Title'))
                    ->required()
                    ->columnSpan('full'),
                DatePicker::make('started_at')
                    ->label(__('Started'))
                    ->required(),
                DatePicker::make('received_at')
                    ->label(__('Received'))
                    ->required(),
                MarkdownEditor::make('description')
                    ->label(__(''))
                    ->toolbarButtons([
                        'redo',
                        'undo',
                    ])
                    ->nullable()
                    ->columnSpan('full'),
            ])->columns()
            ->statePath('data')
            ->model($this->profile);
    }

    public function create(): void
    {
        $this->profile->certificates()
            ->create($this->form->getState());
        toast()->success(__('Saved.'))->push();

        $this->closeModal();
        $this->dispatch('profile-updated');
    }
}
