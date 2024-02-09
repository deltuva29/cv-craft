<?php

namespace App\Filament\Resources\ShareResource\Pages;

use App\Filament\Resources\ShareResource;
use Filament\Resources\Pages\CreateRecord;

class CreateShare extends CreateRecord
{
    protected static string $resource = ShareResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
