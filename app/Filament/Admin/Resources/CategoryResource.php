<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\CategoryResource\Pages;
use App\Filament\Admin\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';
    protected static ?string $navigationGroup = 'إدارة المحتوى';
    protected static ?string $navigationLabel = 'الاصناف';
    protected static ?string $pluralModelLabel = 'الاصناف';
    protected static ?string $modelLabel = 'صنف';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('الإصناف')->description('قم بإضافة الصنف الفرعي والرئيسي ان وجد')
                ->schema([
                            Forms\Components\TextInput::make('name')
                                ->required()
                                ->maxLength(100)
                                ->label('أسم الصنف'),
                            Forms\Components\Select::make('parent_id')
                                ->relationship(name: 'parent' ,titleAttribute: 'name')
                                ->searchable()
                                ->live()
                                ->preload()
                                ->label('الصنف الرئيسي'),
                        ])->columns(2),

            Forms\Components\Section::make('صورة الفئة')->description('قم باضافة صوره للصنف')
                ->schema([
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->label('الصورة'),
            ]),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->label('الصنف الفرعي او الرئيسي'),
                Tables\Columns\TextColumn::make('parent.name')
                    ->numeric()
                    ->sortable()
                    ->label('الصنف الرئيسي')
                    ->placeholder('غير محدد'),
                    ImageColumn::make('image')
                    ->label('الصورة')
                    ->width(50)
                    ->state(function ($record) {
                       return $record->image;
                    })
                    ->height(50) ,
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
                // Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListCategories::route('/'),
            // 'create' => Pages\CreateCategory::route('/create'),
            // 'view' => Pages\ViewCategory::route('/{record}'),
            // 'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
