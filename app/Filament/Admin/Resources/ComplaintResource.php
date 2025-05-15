<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ComplaintResource\Pages;
use App\Filament\Admin\Resources\ComplaintResource\RelationManagers;
use App\Models\Complaint;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ComplaintResource extends Resource
{
    protected static ?string $model = Complaint::class;

    protected static ?string $navigationIcon = 'heroicon-o-exclamation-triangle';
    protected static ?string $navigationGroup ='إدارة المستخدمين';
    protected static ?int $navigationSort = 4;
    protected static ?string $navigationLabel = 'المشاكل والشكاوي';
    protected static ?string $modelLabel = 'المشاكل والشكاوي ';
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
                    Forms\Components\Select::make('user_id')
                        ->label('اسم المستخدم')
                        ->relationship(name: 'user',titleAttribute: 'name')
                        ->required()
                        ->searchable()
                        ->live()
                        ->preload(),
                    Forms\Components\Select::make('listing_id')
                        ->label('اسم الاعلان')
                        ->relationship(name: 'listing',titleAttribute: 'title')
                        ->required()
                        ->searchable()
                        ->live()
                        ->preload(),
                    Forms\Components\Textarea::make('content')
                        ->label('المحتوى')
                        ->required()
                        ->columnSpanFull(),
                ])->columns(2),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('listing.title')
                    ->numeric()
                    ->sortable(),
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
            'index' => Pages\ListComplaints::route('/'),
//            'create' => Pages\CreateComplaint::route('/create'),
//            'view' => Pages\ViewComplaint::route('/{record}'),
//            'edit' => Pages\EditComplaint::route('/{record}/edit'),
        ];
    }
}
