<?php

namespace App\Filament\Admin\Resources\InstitutoResource\RelationManagers;

use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DepartamentoRelationManager extends RelationManager
{
    protected static string $relationship = 'Departamento';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('instituto_id')
                    ->label('Instituto')
                    ->relationship('instituto','nombre'),
                Forms\Components\TextInput::make('nombre')
                    ->label('Nombre')
                    ->required()
                    ->unique(ignoreRecord: true),
                Forms\Components\MarkdownEditor::make('descripcion')
                    ->label('Descripción'),
                Forms\Components\Select::make('jefedepartamento_id')
                    ->label('Jefe de departamento')
                    ->options(User::role('Jefe de departamento')->orderBy('name')->pluck('name', 'id')),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('instituto_id')
            ->columns([

                Tables\Columns\TextColumn::make('nombre')
                ->label('Nombre')
                ->sortable(),
                Tables\Columns\TextColumn::make('descripcion')
                ->toggleable(isToggledHiddenByDefault: true)
                ->label('Descripción'),
                Tables\Columns\TextColumn::make('instituto.nombre')
                ->toggleable()
                ->label('Instituto'),
                Tables\Columns\TextColumn::make('jefededepartamento.name')
                ->label('Jefe de Departamento'),
                Tables\Columns\TextColumn::make('create_at')
                ->label('Creado')
                ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                ->label('Actualizado')
                ->toggleable(isToggledHiddenByDefault: true),

            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
