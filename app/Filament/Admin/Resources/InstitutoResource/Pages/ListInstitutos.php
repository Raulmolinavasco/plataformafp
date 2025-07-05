<?php

namespace App\Filament\Admin\Resources\InstitutoResource\Pages;

use App\Filament\Admin\Resources\InstitutoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInstitutos extends ListRecords
{
    protected static string $resource = InstitutoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\Action::make('Informe')
            ->url(fn():string => route('informeinstituto'))
            ->icon('heroicon-m-pencil-square')
            ->color('info')
            ->button(),
        ];
    }
}
