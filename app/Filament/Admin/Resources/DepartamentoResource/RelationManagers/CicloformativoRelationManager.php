<?php

namespace App\Filament\Admin\Resources\DepartamentoResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CicloformativoRelationManager extends RelationManager
{
    protected static string $relationship = 'cicloformativo';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()

                ->schema([
                    Forms\Components\Section::make('Datos')
                    ->schema([
                        Forms\Components\TextInput::make('nombre')
                        ->label('Nombre')
                        ->required()
                        ->unique(ignoreRecord: true),
                        Forms\Components\MarkdownEditor::make('descripcion')
                        ->label('Descripción'),
                    ]),
                    ]),

                    Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Relaciones')
                        ->schema([
                            Forms\Components\Select::make('tipociclo_id')
                            ->label('Tipo de ciclo formativo')
                            ->relationship('tipociclo','nombre'),
                            Forms\Components\Select::make('departamento_id')
                            ->label('Departamento')
                            ->relationship('departamento','nombre'),
                    ]),
                        ])->columns(2),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('nombre')
            ->columns([
                Tables\Columns\TextColumn::make('nombre')
                ->label('Nombre')
                ->sortable(),
                Tables\Columns\TextColumn::make('descripcion')
                ->toggleable(isToggledHiddenByDefault: true)
                ->label('Descripción'),
                Tables\Columns\TextColumn::make('tipociclo.nombre')
                ->toggleable()
                ->label('Tipo de Ciclo Formativo')
                ->sortable(),
                Tables\Columns\TextColumn::make('departamento.nombre')
                ->label('Departamento')
                ->sortable(),
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
