<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\UserResource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestUsers extends BaseWidget
{
    protected static ?int $sort = 3;

    protected static ?string $heading = 'Latest Users';

    protected int|string|array $columnSpan = 'full';

    public function table(
        Table $table
    ): Table {
        return $table
            ->query(UserResource::getEloquentQuery())
            ->paginated(false)
            ->defaultPaginationPageOption(5)
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('full_name')
                    ->label(__('Name')),
            ]);
    }
}
