<?php

namespace App\Filament\Admin\Resources\InstitutoResource\Pages;

use App\Filament\Admin\Resources\InstitutoResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateInstituto extends CreateRecord
{
    protected static string $resource = InstitutoResource::class;

    protected function getRedirectUrl(): string
{
    return $this->getResource()::getUrl('index');
}

}


