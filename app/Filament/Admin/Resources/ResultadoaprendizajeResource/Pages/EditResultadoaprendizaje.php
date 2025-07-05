<?php

namespace App\Filament\Admin\Resources\ResultadoaprendizajeResource\Pages;

use App\Filament\Admin\Resources\ResultadoaprendizajeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditResultadoaprendizaje extends EditRecord
{
    protected static string $resource = ResultadoaprendizajeResource::class;

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
