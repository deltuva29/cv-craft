<?php

declare(strict_types=1);

namespace App\Livewire\UiElements\Modals\Skill;

use App\Models\Profile;
use App\Models\SkillTitle;
use Filament\Forms\Components\Select;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use LivewireUI\Modal\ModalComponent;

class CreateSkillModal extends ModalComponent implements HasForms
{
    use InteractsWithForms;

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
                    ->label('Name')
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
        $currentSkillIds = $this->profile->skills->pluck('skill_title_id')->toArray();

        $skillsToAdd = array_diff($submittedSkillIds, $currentSkillIds);
        $skillsToRemove = array_diff($currentSkillIds, $submittedSkillIds);

        $newSkills = array_map(fn($skillId) => [
            'skill_title_id' => $skillId,
        ], $skillsToAdd);

        $this->profile->skills()
            ->createMany($newSkills);

        if (!empty($skillsToRemove)) {
            $this->profile->skills()
                ->whereIn('skill_title_id', $skillsToRemove)
                ->delete();
        }

        $this->closeModal();
        $this->dispatch('profile-updated');
    }
}
