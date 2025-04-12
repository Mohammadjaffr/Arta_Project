<?php

namespace App\Filament\Admin\Resources\SocialMediaAccountsResource\Pages;

use App\Filament\Admin\Resources\SocialMediaAccountsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSocialMediaAccounts extends ListRecords
{
    protected static string $resource = SocialMediaAccountsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
