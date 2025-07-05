<?php

namespace App\Filament\Admin\Resources\CicloformativoResource\Pages;

use App\Filament\Admin\Resources\CicloformativoResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCicloformativo extends CreateRecord
{
    protected static string $resource = CicloformativoResource::class;

    protected function getRedirectUrl(): string
{
    return $this->getResource()::getUrl('index');
}
}
