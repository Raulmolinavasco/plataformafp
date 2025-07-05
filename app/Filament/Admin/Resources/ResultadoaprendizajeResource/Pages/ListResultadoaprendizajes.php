<?php

namespace App\Filament\Admin\Resources\ResultadoaprendizajeResource\Pages;

use App\Filament\Admin\Resources\ResultadoaprendizajeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListResultadoaprendizajes extends ListRecords
{
    protected static string $resource = ResultadoaprendizajeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
