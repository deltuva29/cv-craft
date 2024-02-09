<?php

namespace App\Filament\Resources\LanguageTitleResource\Pages;

use App\Filament\Resources\LanguageTitleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLanguageTitle extends EditRecord
{
    protected static string $resource = LanguageTitleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
