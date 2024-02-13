<?php

declare(strict_types=1);

namespace App\Traits\Skills;

trait WithSkills
{
    public function addSkillsToResume($resume, $submittedSkillIds): void
    {
        $currentSkillIds = $resume->skills->pluck('title')->toArray();

        $skillsToAdd = array_diff($submittedSkillIds, $currentSkillIds);
        $skillsToRemove = array_diff($currentSkillIds, $submittedSkillIds);

        $newSkills = array_map(fn($skillId) => [
            'title' => $skillId,
        ], $skillsToAdd);

        $resume->skills()->createMany($newSkills);

        if (!empty($skillsToRemove)) {
            $resume->skills()
                ->whereIn('title', $skillsToRemove)
                ->delete();
        }
    }
}