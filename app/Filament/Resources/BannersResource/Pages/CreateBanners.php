<?php

namespace App\Filament\Resources\BannersResource\Pages;

use App\Filament\Resources\BannersResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBanners extends CreateRecord
{
    protected static string $resource = BannersResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
