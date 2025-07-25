<?php

namespace App\Filament\Admin\Resources\DepartamentoResource\Pages;

use App\Filament\Admin\Resources\DepartamentoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDepartamento extends EditRecord
{
    protected static string $resource = DepartamentoResource::class;

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
