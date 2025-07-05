<?php

namespace App\Filament\Admin\Resources\UnidaddidacticaResource\Pages;

use App\Filament\Admin\Resources\UnidaddidacticaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUnidaddidactica extends EditRecord
{
    protected static string $resource = UnidaddidacticaResource::class;

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
