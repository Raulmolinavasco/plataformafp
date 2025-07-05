<?php

namespace App\Filament\Admin\Resources\TipocicloResource\Pages;

use App\Filament\Admin\Resources\TipocicloResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTipociclo extends CreateRecord
{
    protected static string $resource = TipocicloResource::class;

protected function getRedirectUrl(): string
{
    return $this->getResource()::getUrl('index');
}

}
