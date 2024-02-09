<?php

namespace App\Filament\Resources\ShareResource\Pages;

use App\Enums\ShareTemplate;
use App\Filament\Resources\ShareResource;
use App\Models\Share;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;

class ListShares extends ListRecords
{
    protected static string $resource = ShareResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make()
                ->badge(Share::query()->count()),
            'default' => Tab::make()
                ->modifyQueryUsing(fn($query) => $query->where('template', ShareTemplate::Default))
                ->badge(
                    Share::query()
                        ->where('template', ShareTemplate::Default)
                        ->count()
                ),
        ];
    }
}
