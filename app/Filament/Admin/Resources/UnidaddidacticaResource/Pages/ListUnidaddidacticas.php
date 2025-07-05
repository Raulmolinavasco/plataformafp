<?php

namespace App\Filament\Admin\Resources\UnidaddidacticaResource\Pages;

use App\Filament\Admin\Resources\UnidaddidacticaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUnidaddidacticas extends ListRecords
{
    protected static string $resource = UnidaddidacticaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
