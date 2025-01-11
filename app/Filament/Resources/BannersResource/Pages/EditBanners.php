<?php

namespace App\Filament\Resources\BannersResource\Pages;

use App\Filament\Resources\BannersResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBanners extends EditRecord
{
    protected static string $resource = BannersResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
