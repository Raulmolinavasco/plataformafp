<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ResultadoaprendizajeResource\Pages;
use App\Filament\Resources\ResultadoaprendizajeResource\RelationManagers;
use App\Models\Resultadoaprendizaje;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ResultadoaprendizajeResource extends Resource
{
    protected static ?string $model = Resultadoaprendizaje::class;

    protected static ?string $navigationIcon = 'heroicon-m-cube';

    protected static ?string $navigationLabel = 'Resultado de aprendizaje';

    protected static ?string $navigationGroup = 'Programaciones';

    protected static ?int $navigationSort = 11;

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
                        Forms\Components\Select::make('modulo_id')
                            ->label('Modulo')
                            ->relationship('modulo','nombre'),
                    ]),
                        ])->columns(2),
            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')
                ->label('Resultado de aprendizaje')
                ->sortable(),
                Tables\Columns\TextColumn::make('Modulo.nombre')
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
            'index' => Pages\ListResultadoaprendizajes::route('/'),
            'create' => Pages\CreateResultadoaprendizaje::route('/create'),
            'edit' => Pages\EditResultadoaprendizaje::route('/{record}/edit'),
        ];
    }
}
