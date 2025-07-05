<?php

namespace App\Filament\Profesor\Resources\ModuloResource\Pages;

use App\Filament\Profesor\Resources\ModuloResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditModulo extends EditRecord
{
    protected static string $resource = ModuloResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
