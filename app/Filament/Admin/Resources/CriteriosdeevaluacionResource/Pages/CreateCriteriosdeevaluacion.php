<?php

namespace App\Filament\Admin\Resources\CriteriosdeevaluacionResource\Pages;

use App\Filament\Admin\Resources\CriteriosdeevaluacionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCriteriosdeevaluacion extends CreateRecord
{
    protected static string $resource = CriteriosdeevaluacionResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
