<?php

namespace App\Filament\Resources\SkillTitleResource\Pages;

use App\Filament\Resources\SkillTitleResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSkillTitles extends ListRecords
{
    protected static string $resource = SkillTitleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
