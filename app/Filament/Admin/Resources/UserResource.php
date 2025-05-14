<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\UserResource\Pages;
use App\Filament\Admin\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?string $navigationGroup = 'إدارة المستخدمين';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationLabel = 'المستخدمين';
    protected static ?string $modelLabel = 'المستخدمين ';
    protected static bool $shouldRegisterNavigation = true;



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            Forms\Components\Section::make([
                Forms\Components\TextInput::make('name')
                    ->label('الاسم')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('username')
                    ->label('اسم المستخدم')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->label('الايميل')
                    ->email()
                    ->required()
                    ->maxLength(255),
            ])->columns(3),
                Forms\Components\Section::make([

                    Forms\Components\TextInput::make('password')
                        ->label('كلمة المرور')
                        ->password()
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('contact_number')
                        ->label('رقم الهاتف')
                        ->maxLength(255)
                        ->default(null),
                    Forms\Components\TextInput::make('whatsapp_number')
                        ->label('رقم الواتس')
                        ->maxLength(255)
                        ->default(null),])->columns(3),

                Forms\Components\Section::make([
                    Forms\Components\FileUpload::make('image')
                        ->label('الصوره')
                    ->image(),]),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->label('الإسم'),
                Tables\Columns\TextColumn::make('username')
                    ->searchable()
                    ->label('أسم المستخدم'),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->label('البريد الإلكتروني'),
                Tables\Columns\TextColumn::make('contact_number')
                    ->searchable()
                    ->label('رقم الهاتف'),
                Tables\Columns\TextColumn::make('whatsapp_number')
                    ->label('رقم الواتس')
                    ->searchable()
                    ->label('رقم الواتساب'),
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
            'index' => Pages\ListUsers::route('/'),
//            'create' => Pages\CreateUser::route('/create'),
//            'view' => Pages\ViewUser::route('/{record}'),
//            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
