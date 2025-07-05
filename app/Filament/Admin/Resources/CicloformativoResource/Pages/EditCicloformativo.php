<?php

namespace App\Filament\Admin\Resources\CicloformativoResource\Pages;

use App\Filament\Admin\Resources\CicloformativoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCicloformativo extends EditRecord
{
    protected static string $resource = CicloformativoResource::class;

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
