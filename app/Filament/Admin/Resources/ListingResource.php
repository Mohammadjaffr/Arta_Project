<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ListingResource\Pages;
use App\Filament\Admin\Resources\ListingResource\RelationManagers;
use App\Models\Listing;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ListingResource extends Resource
{
    protected static ?string $model = Listing::class;

    protected static ?string $navigationIcon = 'heroicon-o-list-bullet';
    protected static ?string $navigationGroup = 'إدارة المحتوى';
    protected static ?string $navigationLabel = 'الإعلانات';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make([
                Forms\Components\Section::make([
                Forms\Components\TextInput::make('title')
                    ->label('عنوان الاعلان')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('اسم_المستخدم')
                    ->relationship(name: 'user',titleAttribute: 'name')
                    ->required()
                    ->searchable()
                    ->live()
                    ->preload(),

                    Forms\Components\Textarea::make('وصف_الاعلان')
                ->required()
                ->columnSpanFull(),
                    ])->columns(2),
                Forms\Components\Section::make([
                    Forms\Components\TextInput::make('السعر')

                        ->required()
                        ->numeric(),
                    Forms\Components\Select::make('العمله')
                        ->relationship(name: 'currency',titleAttribute: 'name')
                        ->preload()
                        ->searchable()
                        ->live()
                        ->required(),
                    Forms\Components\Select::make('category_id')
                        ->required()
                        ->relationship(name: 'category',titleAttribute: 'name')
                        ->searchable()
                        ->live()
                        ->preload(),
                ])->columns(3),

                Forms\Components\Section::make([
                    Forms\Components\Select::make('region_id')
                        ->required()
                        ->relationship(name: 'region',titleAttribute: 'name')
                        ->searchable()
                        ->preload()
                        ->live(),
                    Forms\Components\Select::make('status')
                    ->options([
                        'new' => 'جديد',
                        'no_new' => 'مستعمل',
                        'around_new' => 'شبه مستخدم',
                    ])
                        ->placeholder('اختر الحاله')
                        ->required(),
                    Forms\Components\FileUpload::make('primary_image')
                        ->image()
                        ->required()
                        ->columnSpanFull(),
                ])->columns(2),
                ]),
            ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('price')
                    ->money()
                    ->sortable(),
                Tables\Columns\TextColumn::make('currency_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('category_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('region_id')
                
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\ImageColumn::make('primary_image'),
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
            'index' => Pages\ListListings::route('/'),
            'create' => Pages\CreateListing::route('/create'),
            'view' => Pages\ViewListing::route('/{record}'),
            'edit' => Pages\EditListing::route('/{record}/edit'),
        ];
    }
}
