<?php

namespace App\Filament\Admin\Resources\ModuloResource\Pages;

use App\Filament\Admin\Resources\ModuloResource;
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
