<?php

namespace App\Filament\Admin\Resources\CriteriosdeevaluacionResource\Pages;

use App\Filament\Admin\Resources\CriteriosdeevaluacionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCriteriosdeevaluacion extends EditRecord
{
    protected static string $resource = CriteriosdeevaluacionResource::class;

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
