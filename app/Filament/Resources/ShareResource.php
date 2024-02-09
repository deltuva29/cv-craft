<?php

namespace App\Filament\Resources;

use App\Enums\ShareTemplate;
use App\Filament\Resources\ShareResource\Pages;
use App\Filament\Resources\ShareResource\RelationManagers;
use App\Models\Share;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ShareResource extends Resource
{
    protected static ?string $model = Share::class;

    protected static ?string $navigationIcon = 'heroicon-o-share';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('email')
                    ->label(__('Email'))
                    ->required()
                    ->readOnly(),
                TextInput::make('token')
                    ->label(__('Token'))
                    ->required()
                    ->readOnly(),
                Select::make('template')
                    ->label(__('Template'))
                    ->required()
                    ->options(ShareTemplate::class),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('token')
                    ->label(__('Token'))
                    ->extraAttributes(['class' => 'text-sm'])
                    ->weight('bold')
                    ->color('primary'),
                Tables\Columns\TextColumn::make('template')
                    ->badge(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListShares::route('/'),
            'create' => Pages\CreateShare::route('/create'),
            'view' => Pages\ViewShare::route('/{record}'),
            'edit' => Pages\EditShare::route('/{record}/edit'),
        ];
    }
}
