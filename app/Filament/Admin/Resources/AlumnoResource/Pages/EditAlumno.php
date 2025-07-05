<?php

namespace App\Filament\Admin\Resources\AlumnoResource\Pages;

use App\Filament\Admin\Resources\AlumnoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAlumno extends EditRecord
{
    protected static string $resource = AlumnoResource::class;

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
