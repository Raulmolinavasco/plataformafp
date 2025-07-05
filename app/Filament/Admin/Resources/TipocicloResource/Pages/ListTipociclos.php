<?php

namespace App\Filament\Admin\Resources\TipocicloResource\Pages;

use App\Filament\Admin\Resources\TipocicloResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTipociclos extends ListRecords
{
    protected static string $resource = TipocicloResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
