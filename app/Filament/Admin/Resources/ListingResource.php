<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ListingResource\Pages;
use App\Filament\Admin\Resources\ListingResource\RelationManagers;
use App\Livewire\Listings;
use App\Models\Category;
use App\Models\Listing;
use App\Models\region;
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
    protected static ?string $modelLabel = 'الإعلانات ';
    protected static bool $shouldRegisterNavigation = true;

    public static function canCreate(): bool
    {
        return false;
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\Section::make([
                Forms\Components\TextInput::make('title')
                    ->label('عنوان الاعلان')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('user_id')
                    ->label('المستخدم')
                    ->relationship(name: 'user',titleAttribute: 'name')
                    ->required()
                    ->searchable()
                    ->live()
                    ->preload(),

                    Forms\Components\Textarea::make('description')
                        ->label('وصف الاعلان')
                ->required()
                ->columnSpanFull(),
                    ])->columns(2),
                Forms\Components\Section::make([
                    Forms\Components\TextInput::make('price')
                        ->label('السعر')
                        ->required()
                        ->numeric(),
                    Forms\Components\Select::make('currency_id')
                        ->label('العملات')
                        ->relationship(name: 'currency',titleAttribute: 'name')
                        ->preload()
                        ->searchable()
                        ->live()
                        ->required(),
                    Forms\Components\Select::make('category_id')
                        ->label('الفئات الرئيسية')
                        ->required()
                        ->relationship(
                            name: 'category',
                            titleAttribute: 'name',
                            modifyQueryUsing: fn(Builder $query) => $query->whereNull('parent_id')
                        )
                        ->searchable()
                        ->preload()
                        ->live()
                        ->afterStateUpdated(function (Forms\Set $set) {
                            $set('subcategories', null); // Reset subcategory when parent changes
                        }),

                    Forms\Components\Select::make('subcategories')
                        ->label('الفئات الفرعية')
                        ->options(function (Forms\Get $get): array {
                            if (!$parentId = $get('category_id')) {
                                return [];
                            }

                            return Category::where('parent_id', $parentId)
                                ->pluck('name', 'id')
                                ->toArray();
                        })
                        ->searchable()
                        ->live()
                        ->hidden(fn(Forms\Get $get): bool => !$get('category_id'))

                ])->columns(4),
                    Forms\Components\Section::make([ Forms\Components\Select::make('status')
                        ->label('الحاله')
                        ->options([
                            'جديد' => 'جديد',
                            'مستعمل' => 'مستعمل',
                            'شبه مستخدم' => 'شبه مستخدم',
                        ])
                        ->placeholder('اختر الحاله')
                        ->required(),

                        Forms\Components\Select::make('region_id') // يجب أن يكون اسم الحقل متسقاً
                        ->label('المناطق والاحياء')
                            ->required()
                            ->relationship(
                                name: 'region', // اسم العلاقة في المودل
                                titleAttribute: 'name',
                                modifyQueryUsing: fn(Builder $query) => $query->whereNull('parent_id')
                            )
                            ->searchable()
                            ->preload()
                            ->live()
                            ->afterStateUpdated(function (Forms\Set $set) {
                                $set('subregions', null); // يجب أن يتطابق مع اسم الحقل الثاني
                            }),

                        Forms\Components\Select::make('subregions')
                            ->label('الفئات الفرعية')
                            ->options(function (Forms\Get $get): array {
                                if (!$parentId = $get('region_id')) {
                                    return [];
                                }

                                return Region::where('parent_id', $parentId)
                                    ->pluck('name', 'id')
                                    ->toArray();
                            })
                            ->searchable()
                            ->live()
                            ->hidden(fn(Forms\Get $get): bool => !$get('region_id')),



                        Forms\Components\FileUpload::make('primary_image')
                            ->label('الصوره')
                            ->image()
                            ->required()
                            ->columnSpanFull(),
                    ])->columns(3),
                    ]);


    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('العنوان')
                    ->searchable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('المستخدمين')
                    ->sortable(),
                Tables\Columns\TextColumn::make('price')
                    ->label('السعر')
                    ->money()
                    ->sortable(),
                Tables\Columns\TextColumn::make('currency.name')
                    ->label('العمله')
                    ->sortable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->label('الفئه')
                    ->sortable(),
                Tables\Columns\TextColumn::make('region.name')
                    ->label('المنطقه')
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
            ->label('الحاله'),
                Tables\Columns\ImageColumn::make('primary_image')
                    ->label('الصورة')
                    ->width(80)
                    ->height(80),
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
            'index' => Pages\ListListings::route('/'),
//            'create' => Pages\CreateListing::route('/create'),
//            'view' => Pages\ViewListing::route('/{record}'),
//            'edit' => Pages\EditListing::route('/{record}/edit'),
        ];
    }
}
