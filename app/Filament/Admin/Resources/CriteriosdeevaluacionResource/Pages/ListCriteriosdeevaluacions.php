<?php

namespace App\Filament\Admin\Resources\CriteriosdeevaluacionResource\Pages;

use App\Filament\Admin\Resources\CriteriosdeevaluacionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCriteriosdeevaluacions extends ListRecords
{
    protected static string $resource = CriteriosdeevaluacionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
