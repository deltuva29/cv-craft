<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LanguageLevelResource\Pages;
use App\Filament\Resources\LanguageLevelResource\RelationManagers;
use App\Models\LanguageLevel;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class LanguageLevelResource extends Resource
{
    protected static ?string $model = LanguageLevel::class;

    protected static ?string $navigationGroup = 'Settings';

    protected static ?int $navigationSort = 1;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->label(__('Name'))
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListLanguageLevels::route('/'),
            'create' => Pages\CreateLanguageLevel::route('/create'),
            'view' => Pages\ViewLanguageLevel::route('/{record}'),
            'edit' => Pages\EditLanguageLevel::route('/{record}/edit'),
        ];
    }
}
