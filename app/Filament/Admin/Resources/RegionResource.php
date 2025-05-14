<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\RegionResource\Pages;
use App\Filament\Admin\Resources\RegionResource\RelationManagers;
use App\Models\Region;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RegionResource extends Resource
{
    protected static ?string $model = Region::class;

    protected static ?string $navigationIcon = 'heroicon-o-globe-alt';
    protected static ?string $navigationGroup =  'إدارة المحتوى';
    protected static ?string $navigationLabel = 'المناطق والاحياء';
    protected static ?string $pluralModelLabel = 'المناطق';
    protected static ?string $modelLabel = 'منطقة';
    protected static bool $shouldRegisterNavigation = true;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make([
                    Forms\Components\TextInput::make('name')
                        ->required()
                        ->maxLength(100)
                        ->label('المدينة او الحي'),
                    Forms\Components\Select::make('parent_id')
                        ->relationship(name: 'parent', titleAttribute: 'name')
                        ->preload()
                        ->searchable()
                        ->label('المدينة')
                        ->live(),
        Forms\Components\TextInput::make('latitude')
                        ->required()
                        ->numeric()
                        ->label('خط العرض'),
                    Forms\Components\TextInput::make('longitude')
                        ->required()
                        ->numeric()
                        ->label('خط الطول'),
                ])->columns(4),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->label('المدينة او الحي'),
                Tables\Columns\TextColumn::make('parent.name')
                    ->numeric()
                    ->sortable()
                    ->label('المدينة')
                    ->placeholder('غير محدد'),
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
                Tables\Columns\TextColumn::make('latitude')
                    ->numeric()
                    ->sortable()
                    ->label('خط العرض'),
                Tables\Columns\TextColumn::make('longitude')
                    ->numeric()
                    ->sortable()
                    ->label('خط الطول'),
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
            'index' => Pages\ListRegions::route('/'),
            // 'create' => Pages\CreateRegion::route('/create'),
            // 'view' => Pages\ViewRegion::route('/{record}'),
            // 'edit' => Pages\EditRegion::route('/{record}/edit'),
        ];
    }
}
