<?php

namespace App\Filament\Admin\Resources\ProgramacionResource\RelationManagers;

use App\Models\Programacion;
use App\Models\Unidaddidactica;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;

class UnidaddidacticasRelationManager extends RelationManager
{
    protected static string $relationship = 'unidaddidacticas';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')
                        ->label('Nombre')
                        ->required()
                        ->unique(ignoreRecord: true),
                Forms\Components\MarkdownEditor::make('descripcion')
                        ->label('Descripción'),
                Forms\Components\Hidden::make('modulo_id')
                ->default(function ($livewire){
                    return $livewire->ownerRecord->modulo_id;
                }),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('nombre')
            ->columns([
                Tables\Columns\TextColumn::make('nombre'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()->modal(),
            ])
            ->actions([
                Tables\Actions\EditAction::make()->modal(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function canViewForRecord(Model $ownerRecord, $visible): bool
{
//dd($visible);
    return true;
}


}
