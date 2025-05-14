<?php

namespace App\Filament\Admin\Resources\SocialMediaAccountsResource\Pages;

use App\Filament\Admin\Resources\SocialMediaAccountsResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewSocialMediaAccounts extends ViewRecord
{
    protected static string $resource = SocialMediaAccountsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
