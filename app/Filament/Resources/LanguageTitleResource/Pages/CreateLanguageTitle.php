<?php

namespace App\Filament\Resources\LanguageTitleResource\Pages;

use App\Filament\Resources\LanguageTitleResource;
use Filament\Resources\Pages\CreateRecord;

class CreateLanguageTitle extends CreateRecord
{
    protected static string $resource = LanguageTitleResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
