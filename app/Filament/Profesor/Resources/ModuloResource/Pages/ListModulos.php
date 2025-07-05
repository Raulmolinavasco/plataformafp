<?php

namespace App\Filament\Profesor\Resources\ModuloResource\Pages;

use App\Filament\Profesor\Resources\ModuloResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListModulos extends ListRecords
{
    protected static string $resource = ModuloResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
