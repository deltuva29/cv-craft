<?php

namespace App\Filament\Resources\SkillTitleResource\Pages;

use App\Filament\Resources\SkillTitleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSkillTitle extends EditRecord
{
    protected static string $resource = SkillTitleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
