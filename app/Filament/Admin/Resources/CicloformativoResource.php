<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\CicloformativoResource\Pages;
use App\Filament\Admin\Resources\CicloformativoResource\RelationManagers;
use App\Models\Cicloformativo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CicloformativoResource extends Resource
{
    protected static ?string $model = Cicloformativo::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?string $navigationLabel = 'Ciclo formativo';

    protected static ?string $navigationGroup = 'Centros';

    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()

                ->schema([
                    Forms\Components\Section::make('Datos')
                    ->schema([
                        Forms\Components\TextInput::make('codigo')
                        ->label('Código del ciclo formativo'),
                        Forms\Components\TextInput::make('nombre')
                        ->label('Nombre')
                        ->required()
                        ->unique(ignoreRecord: true),
                        Forms\Components\MarkdownEditor::make('descripcion')
                        ->label('Descripción'),
                        Forms\Components\TextInput::make('duracion')
                        ->label('Duración del ciclo formativo'),
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

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('codigo')
                ->label('Código')
                ->sortable(),
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
                Tables\Columns\TextColumn::make('duracion')
                ->label('Duracion')
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
            'index' => Pages\ListCicloformativos::route('/'),
            'create' => Pages\CreateCicloformativo::route('/create'),
            'edit' => Pages\EditCicloformativo::route('/{record}/edit'),
        ];
    }
}
