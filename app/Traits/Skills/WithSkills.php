<?php

declare(strict_types=1);

namespace App\Traits\Skills;

trait WithSkills
{
    public function addSkillsToProfile($profile, $submittedSkillIds): void
    {
        $currentSkillIds = $profile->skills->pluck('title')->toArray();

        $skillsToAdd = array_diff($submittedSkillIds, $currentSkillIds);
        $skillsToRemove = array_diff($currentSkillIds, $submittedSkillIds);

        $newSkills = array_map(fn($skillId) => [
            'title' => $skillId,
        ], $skillsToAdd);

        $profile->skills()->createMany($newSkills);

        if (!empty($skillsToRemove)) {
            $profile->skills()
                ->whereIn('title', $skillsToRemove)
                ->delete();
        }
    }
}