<?php

namespace App\Filament\Admin\Resources\AlumnoResource\Pages;

use App\Filament\Admin\Resources\AlumnoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAlumnos extends ListRecords
{
    protected static string $resource = AlumnoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
