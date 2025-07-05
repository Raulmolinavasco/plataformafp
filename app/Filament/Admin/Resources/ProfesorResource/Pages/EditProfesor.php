<?php

namespace App\Filament\Admin\Resources\ProfesorResource\Pages;

use App\Filament\Admin\Resources\ProfesorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProfesor extends EditRecord
{
    protected static string $resource = ProfesorResource::class;

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
