<?php

namespace App\Filament\Admin\Resources\UserResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProfesorRelationManager extends RelationManager
{
    protected static string $relationship = 'Profesores';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Relaciones')
                ->schema([
                Forms\Components\Select::make('user_id')
                    ->label('Usuario')
                    ->relationship('user','name'),
                Forms\Components\Select::make('departamento_id')
                    ->label('Departamento')
                    ->relationship('departamento','nombre'),
            ])
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('user_id')
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                ->label('Nombre del profesor')
                ->sortable(),
                Tables\Columns\TextColumn::make('departamento.nombre')
                ->toggleable()
                ->label('Departamento')
                ->sortable(),
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
