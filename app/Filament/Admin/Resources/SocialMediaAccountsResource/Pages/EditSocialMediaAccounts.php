<?php

namespace App\Filament\Admin\Resources\SocialMediaAccountsResource\Pages;

use App\Filament\Admin\Resources\SocialMediaAccountsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSocialMediaAccounts extends EditRecord
{
    protected static string $resource = SocialMediaAccountsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
