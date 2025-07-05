<?php

namespace App\Filament\Admin\Resources\ResultadoaprendizajeResource\Pages;

use App\Filament\Admin\Resources\ResultadoaprendizajeResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateResultadoaprendizaje extends CreateRecord
{
    protected static string $resource = ResultadoaprendizajeResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }


}
