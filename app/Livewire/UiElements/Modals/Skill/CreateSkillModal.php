<?php

declare(strict_types=1);

namespace App\Livewire\UiElements\Modals\Skill;

use App\Models\Profile;
use App\Models\SkillTitle;
use App\Traits\Skills\WithSkills;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Illuminate\Contracts\View\View;
use LivewireUI\Modal\ModalComponent;
use Usernotnull\Toast\Concerns\WireToast;

class CreateSkillModal extends ModalComponent implements HasForms
{
    use WireToast;
    use InteractsWithForms;
    use WithSkills;

    public ?array $data = [];

    public Profile $profile;

    public static function modalMaxWidth(): string
    {
        return '2xl';
    }

    public function mount(Profile $profile): void
    {
        $this->profile = $profile;
        $this->form->fill([
            'title' => $profile->skills()
                ->pluck('title')
                ->toArray(),
        ]);
    }

    public function render(): View
    {
        return view('livewire.ui-elements.modals.skill.create-skill-modal');
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('title')
                    ->label(__('Select Skill'))
                    ->multiple()
                    ->nullable()
                    ->options(
                        SkillTitle::all()
                            ->pluck('title', 'title')
                    )
                    ->searchable()
                    ->preload()
                    ->reactive()
                    ->hidden(fn(Get $get) => $get('custom_title')),
                Checkbox::make('custom')
                    ->label(__('Add Custom Skill?'))
                    ->reactive()
                    ->afterStateUpdated(fn(Set $set, ?bool $state): bool => $set('custom_title', $state)),
                TextInput::make('custom_name')
                    ->label(__('Custom Skill Title'))
                    ->required()
                    ->visible(fn(Get $get) => $get('custom_title')),
            ])
            ->statePath('data')
            ->model($this->profile);
    }

    public function create(): void
    {
        $formData = $this->form->getState();
        $isCustomSkill = $formData['custom'] ?? false;
        $customSkillName = $formData['custom_name'] ?? '';
        $selectedSkillTitles = $formData['title'] ?? [];

        if ($isCustomSkill) {
            $this->profile->skills()->create([
                'custom' => true,
                'title' => $customSkillName,
            ]);
        } else {
            $submittedSkillIds = $selectedSkillTitles;

            $this->addSkillsToProfile(
                $this->profile,
                $submittedSkillIds
            );
        }

        toast()->success(__('Saved.'))->push();
        $this->closeModal();
        $this->dispatch('profile-updated');
    }
}
