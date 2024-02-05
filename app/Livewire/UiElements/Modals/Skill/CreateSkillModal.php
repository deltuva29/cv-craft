<?php

declare(strict_types=1);

namespace App\Livewire\UiElements\Modals\Skill;

use App\Models\Profile;
use App\Models\SkillTitle;
use App\Traits\Skills\WithSkills;
use Filament\Forms\Components\Select;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use LivewireUI\Modal\ModalComponent;

class CreateSkillModal extends ModalComponent implements HasForms
{
    use InteractsWithForms;
    use WithSkills;

    public ?array $data = [];

    public Profile $profile;

    public ?int $unselectedSkills = 0;

    public static function modalMaxWidth(): string
    {
        return '2xl';
    }

    public function mount(Profile $profile): void
    {
        $this->profile = $profile;
        $this->form->fill([
            'skill_title_id' => $profile->skills->pluck('skill_title_id')->toArray(),
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
                Select::make('skill_title_id')
                    ->label('Select Skill')
                    ->multiple()
                    ->nullable()
                    ->options(
                        SkillTitle::all()
                            ->pluck('title', 'id')
                    )
                    ->searchable()
                    ->preload()
                    ->reactive(),
            ])
            ->statePath('data')
            ->model($this->profile);
    }

    public function create(): void
    {
        $submittedSkillIds = $this->form->getState()['skill_title_id'] ?? [];

        $this->addSkillsToProfile(
            $this->profile,
            $submittedSkillIds
        );

        $this->closeModal();
        $this->dispatch('profile-updated');
    }
}
