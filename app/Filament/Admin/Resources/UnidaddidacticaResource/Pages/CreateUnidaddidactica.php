<?php

namespace App\Filament\Admin\Resources\UnidaddidacticaResource\Pages;

use App\Filament\Admin\Resources\UnidaddidacticaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUnidaddidactica extends CreateRecord
{
    protected static string $resource = UnidaddidacticaResource::class;

    protected function getRedirectUrl(): string
{
    return $this->getResource()::getUrl('index');
}
}
