<?php

namespace App\Filament\Admin\Resources\CicloformativoResource\Pages;

use App\Filament\Admin\Resources\CicloformativoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCicloformativos extends ListRecords
{
    protected static string $resource = CicloformativoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
