<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompanyResource\Pages;
use App\Filament\Resources\CompanyResource\RelationManagers;
use App\Models\Company;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CompanyResource extends Resource
{
    protected static ?string $model = Company::class;

    protected static ?string $navigationLabel = 'Companies';

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label(__('Name'))
                    ->required(),
                TextInput::make('website')
                    ->label(__('Website URL'))
                    ->url(),
                TextInput::make('industry')
                    ->label(__('Industry'))
                    ->required(),
                TextInput::make('logo')
                    ->label(__('Logo'))
                    ->required(),
                TextInput::make('logo')
                    ->label(__('Logo'))
                    ->required(),
                TextInput::make('founded')
                    ->label(__('Founded year'))
                    ->required(),
                TextInput::make('size')
                    ->label(__('Size'))
                    ->required(),
                TextInput::make('revenue')
                    ->label(__('Revenue'))
                    ->required(),
                TextInput::make('headquarters')
                    ->label(__('Headquarters'))
                    ->required(),
                TextInput::make('type')
                    ->label(__('Type'))
                    ->required(),
                TextInput::make('specialties')
                    ->label(__('Specialties'))
                    ->required(),
                TextInput::make('linkedin')
                    ->label(__('LinkedIn URL'))
                    ->suffix('linkedin.com/company/')
                    ->url(),
                TextInput::make('facebook')
                    ->label(__('Facebook URL'))
                    ->suffix('facebook.com/')
                    ->url(),
                TextInput::make('facebook')
                    ->label(__('Facebook URL'))
                    ->suffix('facebook.com/')
                    ->url(),
                TextInput::make('twitter')
                    ->label(__('Twitter URL'))
                    ->suffix('twitter.com/')
                    ->url(),
                TextInput::make('instagram')
                    ->label(__('Instagram URL'))
                    ->suffix('instagram.com/')
                    ->url(),
                MarkdownEditor::make('description')
                    ->required(),
                Checkbox::make('verified')
                    ->label(__('Verified')),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('Name'))
                    ->weight('bold'),
                Tables\Columns\TextColumn::make('website')
                    ->label(__('Website URL'))
                    ->url(fn(Company $company): string => $company->website ?? '-', true)
                    ->color('primary'),
                Tables\Columns\TextColumn::make('industry')
                    ->label(__('Industry')),
                Tables\Columns\TextColumn::make('logo')
                    ->label(__('Logo')),
                Tables\Columns\TextColumn::make('founded')
                    ->label(__('Founded year')),
                Tables\Columns\TextColumn::make('size')
                    ->label(__('Size')),
                Tables\Columns\TextColumn::make('revenue')
                    ->label(__('Revenue')),
                Tables\Columns\TextColumn::make('headquarters')
                    ->label(__('Headquarters')),
                Tables\Columns\TextColumn::make('type')
                    ->label(__('Type')),
                Tables\Columns\TextColumn::make('specialties')
                    ->label(__('Specialties')),
                Tables\Columns\TextColumn::make('linkedin')
                    ->label(__('LinkedIn URL'))
                    ->url(fn(Company $company): string => $company->linkedin ?? '-', true)
                    ->color('primary'),
                Tables\Columns\TextColumn::make('facebook')
                    ->label(__('Facebook URL'))
                    ->url(fn(Company $company): string => $company->facebook ?? '-', true)
                    ->color('primary'),
                Tables\Columns\TextColumn::make('twitter')
                    ->label(__('Twitter URL'))
                    ->url(fn(Company $company): string => $company->twitter ?? '-', true)
                    ->color('primary'),
                Tables\Columns\TextColumn::make('instagram')
                    ->label(__('Instagram URL'))
                    ->url(fn(Company $company): string => $company->instagram ?? '-', true)
                    ->color('primary'),
                Tables\Columns\TextColumn::make('description')
                    ->label(__('Description')),
                Tables\Columns\IconColumn::make('verified')
                    ->label(__('Verified')),
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
            'index' => Pages\ListCompanies::route('/'),
            'create' => Pages\CreateCompany::route('/create'),
            'view' => Pages\ViewCompany::route('/{record}'),
            'edit' => Pages\EditCompany::route('/{record}/edit'),
        ];
    }
}
