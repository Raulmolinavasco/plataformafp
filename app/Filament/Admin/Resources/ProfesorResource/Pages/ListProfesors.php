<?php

namespace App\Filament\Admin\Resources\ProfesorResource\Pages;

use App\Filament\Admin\Resources\ProfesorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProfesors extends ListRecords
{
    protected static string $resource = ProfesorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
