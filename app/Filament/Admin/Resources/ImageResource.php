<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ImageResource\Pages;
use App\Filament\Admin\Resources\ImageResource\RelationManagers;
use App\Models\Image;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ImageResource extends Resource
{
    protected static ?string $model = Image::class;
    protected static ?string $modelLabel = 'الصور ';

    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationGroup =  'إدارة المحتوى';
    protected static ?string $navigationLabel = 'الصور';
    protected static ?string $pluralModelLabel = 'الصور';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make([
                    Forms\Components\TextInput::make('listing_id')
                        ->label('رقم الاعلان')
                        ->required()
                        ->numeric(),
                    Forms\Components\TextInput::make('path')
                        ->label('المسار')
                        ->required()
                        ->maxLength(255),
                ])->columns(2),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('listing_id')
                    ->label('رقم الاعلان')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('path')
                    ->label('المسار')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('تم انشائها')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('تم تحديثها')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
//                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListImages::route('/'),
//            'create' => Pages\CreateImage::route('/create'),
//            'view' => Pages\ViewImage::route('/{record}'),
//            'edit' => Pages\EditImage::route('/{record}/edit'),
        ];
    }
}
