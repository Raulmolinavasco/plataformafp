<?php

namespace App\Filament\Admin\Resources\ProfesorResource\Pages;

use App\Filament\Admin\Resources\ProfesorResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProfesor extends CreateRecord
{
    protected static string $resource = ProfesorResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
  /*  protected function mutateFormDataBeforeCreate(array $data):array
    {
        $data['nombre']='User::';
        return $data;
    }
        */
}
