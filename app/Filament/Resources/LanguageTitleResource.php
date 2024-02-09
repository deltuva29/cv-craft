<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LanguageTitleResource\Pages;
use App\Filament\Resources\LanguageTitleResource\RelationManagers;
use App\Models\LanguageTitle;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class LanguageTitleResource extends Resource
{
    protected static ?string $model = LanguageTitle::class;

    protected static ?string $navigationGroup = 'Settings';

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

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
            'index' => Pages\ListLanguageTitles::route('/'),
            'create' => Pages\CreateLanguageTitle::route('/create'),
            'view' => Pages\ViewLanguageTitle::route('/{record}'),
            'edit' => Pages\EditLanguageTitle::route('/{record}/edit'),
        ];
    }
}
