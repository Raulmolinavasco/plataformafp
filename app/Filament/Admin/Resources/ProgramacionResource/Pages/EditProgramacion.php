<?php

namespace App\Filament\Admin\Resources\ProgramacionResource\Pages;

use App\Filament\Admin\Resources\ProgramacionResource;
use Filament\Actions;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Wizard\Step;
use Filament\Resources\Pages\EditRecord;

class EditProgramacion extends EditRecord
{

    protected static string $resource = ProgramacionResource::class;


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
    public function hasCombinedRelationManagerTabsWithContent(): bool
{
    return true;
}
}
