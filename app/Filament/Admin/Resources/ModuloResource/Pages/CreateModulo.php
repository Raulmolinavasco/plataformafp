<?php

namespace App\Filament\Admin\Resources\ModuloResource\Pages;

use App\Filament\Admin\Resources\ModuloResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateModulo extends CreateRecord
{
    protected static string $resource = ModuloResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
