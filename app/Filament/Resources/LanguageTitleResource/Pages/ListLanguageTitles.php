<?php

namespace App\Filament\Resources\LanguageTitleResource\Pages;

use App\Filament\Resources\LanguageTitleResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLanguageTitles extends ListRecords
{
    protected static string $resource = LanguageTitleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
