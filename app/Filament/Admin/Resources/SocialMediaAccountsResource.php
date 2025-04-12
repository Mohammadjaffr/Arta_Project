<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\SocialMediaAccountsResource\Pages;
use App\Filament\Admin\Resources\SocialMediaAccountsResource\RelationManagers;
use App\Models\SocialMediaAccounts;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SocialMediaAccountsResource extends Resource
{
    protected static ?string $model = SocialMediaAccounts::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('twitter')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('facebook')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('instagram')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('linkedin')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('youtube')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('snapchat')
                    ->maxLength(255)
                    ->default(null),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('twitter')
                    ->searchable(),
                Tables\Columns\TextColumn::make('facebook')
                    ->searchable(),
                Tables\Columns\TextColumn::make('instagram')
                    ->searchable(),
                Tables\Columns\TextColumn::make('linkedin')
                    ->searchable(),
                Tables\Columns\TextColumn::make('youtube')
                    ->searchable(),
                Tables\Columns\TextColumn::make('snapchat')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListSocialMediaAccounts::route('/'),
            'create' => Pages\CreateSocialMediaAccounts::route('/create'),
            'view' => Pages\ViewSocialMediaAccounts::route('/{record}'),
            'edit' => Pages\EditSocialMediaAccounts::route('/{record}/edit'),
        ];
    }
}
