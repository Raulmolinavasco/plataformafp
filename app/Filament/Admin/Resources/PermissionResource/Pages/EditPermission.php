<?php

namespace App\Filament\Admin\Resources\PermissionResource\Pages;

use App\Filament\Admin\Resources\PermissionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPermission extends EditRecord
{
    protected static string $resource = PermissionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    protected function getSaveNotificationTitle(): ?string
    {
        return 'Permiso modificado';
    }
    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
}
