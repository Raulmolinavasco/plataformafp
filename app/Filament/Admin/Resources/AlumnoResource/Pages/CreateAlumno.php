<?php

namespace App\Filament\Admin\Resources\AlumnoResource\Pages;

use App\Filament\Admin\Resources\AlumnoResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAlumno extends CreateRecord
{
    protected static string $resource = AlumnoResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
