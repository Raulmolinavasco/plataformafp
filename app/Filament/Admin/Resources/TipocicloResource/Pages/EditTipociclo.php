<?php

namespace App\Filament\Admin\Resources\TipocicloResource\Pages;

use App\Filament\Admin\Resources\TipocicloResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTipociclo extends EditRecord
{
    protected static string $resource = TipocicloResource::class;

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
