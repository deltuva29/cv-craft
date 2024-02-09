<?php

namespace App\Filament\Resources\SkillTitleResource\Pages;

use App\Filament\Resources\SkillTitleResource;
use Filament\Resources\Pages\CreateRecord;

class CreateSkillTitle extends CreateRecord
{
    protected static string $resource = SkillTitleResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
