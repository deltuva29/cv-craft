<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\ShareResource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestShares extends BaseWidget
{
    protected static ?int $sort = 4;

    protected static ?string $heading = 'Latest CV Shares';

    protected int|string|array $columnSpan = 'full';

    public function table(
        Table $table
    ): Table {
        return $table
            ->query(ShareResource::getEloquentQuery())
            ->defaultPaginationPageOption(10)
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('profile.owner.full_name'),
                TextColumn::make('email')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('token')
                    ->label(__('Share token'))
                    ->formatStateUsing(fn($state) => '<a href="'.route('view.share', $state).'" target="_blank">
                            '.__('View CV').'
                        </a>'
                    )
                    ->extraAttributes(['class' => 'text-sm'])
                    ->weight('bold')
                    ->color('primary')
                    ->icon('heroicon-o-clipboard-document-list')
                    ->html()
                    ->copyable(),
                TextColumn::make('template')
                    ->badge(),
            ]);
    }
}
