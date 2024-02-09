<?php

namespace App\Filament\Resources\LanguageLevelResource\Pages;

use App\Filament\Resources\LanguageLevelResource;
use Filament\Resources\Pages\CreateRecord;

class CreateLanguageLevel extends CreateRecord
{
    protected static string $resource = LanguageLevelResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
