<?php

namespace App\Filament\Admin\Resources\InstitutoResource\Pages;

use App\Filament\Admin\Resources\InstitutoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInstituto extends EditRecord
{
    protected static string $resource = InstitutoResource::class;

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
