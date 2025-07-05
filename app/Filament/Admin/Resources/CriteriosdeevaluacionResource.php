<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\CriteriosdeevaluacionResource\Pages;
use App\Filament\Resources\CriteriosdeevaluacionResource\RelationManagers;
use App\Models\Criteriosdeevaluacion;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CriteriosdeevaluacionResource extends Resource
{
    protected static ?string $model = Criteriosdeevaluacion::class;

    protected static ?string $navigationIcon = 'heroicon-c-shopping-cart';

    protected static ?string $navigationLabel = 'Criterios de evaluación';

    protected static ?string $navigationGroup = 'Programaciones';

    protected static ?int $navigationSort = 12;

    public static function form(Form $form): Form
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
                        Forms\Components\Select::make('resultadoaprendizaje_id')
                            ->label('Resultado de aprendizaje')
                            ->relationship('resultadoaprendizaje','nombre'),
                    ]),
                        ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')
                ->label('Criterio de evaluación')
                ->sortable(),
                Tables\Columns\TextColumn::make('resultadoaprendizaje.nombre')
                ->toggleable()
                ->label('Resultado de aprendizaje')
                ->sortable(),
                Tables\Columns\TextColumn::make('resultadoaprendizaje.modulo.nombre')
                ->toggleable()
                ->label('Modulo asociado')
                ->sortable(),
                Tables\Columns\TextColumn::make('descripcion')
                ->label('Descripcion')
                ->sortable(),
            ])
            ->filters([
                //
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCriteriosdeevaluacions::route('/'),
            'create' => Pages\CreateCriteriosdeevaluacion::route('/create'),
            'edit' => Pages\EditCriteriosdeevaluacion::route('/{record}/edit'),
        ];
    }
}
