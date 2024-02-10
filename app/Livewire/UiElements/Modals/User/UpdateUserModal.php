<?php

namespace App\Livewire\UiElements\Modals\User;

use App\Models\User;
use Filament\Forms\Components\Select;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use LivewireUI\Modal\ModalComponent;
use Usernotnull\Toast\Concerns\WireToast;

class UpdateUserModal extends ModalComponent implements HasForms
{
    use WireToast;
    use InteractsWithForms;

    public ?array $data = [];

    public User $user;

    public static function modalMaxWidth(): string
    {
        return '2xl';
    }

    public function mount(): void
    {
        $this->user = auth()->user();
        $this->form->fill(
            $this->user->only([
                'language',
            ])
        );
    }

    public function render(): View
    {
        return view('livewire.ui-elements.modals.user.update-user-modal');
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
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
            ->statePath('data');
    }

    public function save(): void
    {
        $this->user->update($this->form->getState());
        toast()->success(__('Saved.'))->push();

        $this->redirectIntended('/dashboard');

        $this->closeModal();
        $this->dispatch('profile-updated');
    }
}
