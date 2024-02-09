<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SkillTitleResource\Pages;
use App\Filament\Resources\SkillTitleResource\RelationManagers;
use App\Models\SkillTitle;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class SkillTitleResource extends Resource
{
    protected static ?string $model = SkillTitle::class;

    protected static ?string $navigationGroup = 'Settings';

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
                    ->required()
                    ->afterStateUpdated(fn(Set $set, $state) => $set('slug', Str::slug($state))),
                TextInput::make('slug')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('slug'),
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
            'index' => Pages\ListSkillTitles::route('/'),
            'create' => Pages\CreateSkillTitle::route('/create'),
            'view' => Pages\ViewSkillTitle::route('/{record}'),
            'edit' => Pages\EditSkillTitle::route('/{record}/edit'),
        ];
    }
}
