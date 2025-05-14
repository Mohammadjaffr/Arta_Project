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

    protected static ?string $navigationIcon = 'heroicon-o-share';
    protected static ?string $navigationGroup = 'إدارة المستخدمين';
    protected static ?int $navigationSort = 3;
    protected static ?string $modelLabel = 'حسابات التواصل الاجتماعي ';
    protected static bool $shouldRegisterNavigation = true;

    protected static ?string $navigationLabel = 'روابط التواصل الإجتماعي';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make([Forms\Components\TextInput::make('user_id')
                    ->label('اسم المستخدم')
                    ->required()
                    ->numeric(),
                    Forms\Components\TextInput::make('twitter')
                        ->label('تويتر')
                        ->maxLength(255)
                        ->default(null),
                    Forms\Components\TextInput::make('facebook')
                        ->label('فيس بوك')
                        ->maxLength(255)
                        ->default(null),])->columns(3),
                Forms\Components\Section::make([
                    Forms\Components\TextInput::make('instagram')
                        ->label('انستقرام')

                        ->maxLength(255)
                        ->default(null),
                    Forms\Components\TextInput::make('linkedin')
                        ->label('لبنك ايند')
                        ->maxLength(255)
                        ->default(null),
                    Forms\Components\TextInput::make('youtube')
                        ->label('يوتيوب')
                        ->maxLength(255)
                        ->default(null),])->columns(3),

//                Forms\Components\TextInput::make('snapchat')
//                    ->maxLength(255)
//                    ->default(null),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('اسم المستخدم')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('twitter')
                    ->label('تويتر')
                    ->searchable(),
                Tables\Columns\TextColumn::make('facebook')
                    ->label('فيس بوك')
                    ->searchable(),
                Tables\Columns\TextColumn::make('instagram')
                    ->label('انستقرام')
                    ->searchable(),
                Tables\Columns\TextColumn::make('linkedin')
                    ->label('لبنك ايند')
                    ->searchable(),
                Tables\Columns\TextColumn::make('youtube')
                    ->label('يوتيوب')
                    ->searchable(),
//                Tables\Columns\TextColumn::make('snapchat')
//                    ->searchable(),
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
            'index' => Pages\ListSocialMediaAccounts::route('/'),
//            'create' => Pages\CreateSocialMediaAccounts::route('/create'),
//            'view' => Pages\ViewSocialMediaAccounts::route('/{record}'),
//            'edit' => Pages\EditSocialMediaAccounts::route('/{record}/edit'),
        ];
    }
}
