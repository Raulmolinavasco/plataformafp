<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\CursoResource\Pages;
use App\Filament\Admin\Resources\CursoResource\RelationManagers\ModuloRelationManager;
use App\Filament\Resources\CursoResource\RelationManagers;
use App\Models\Curso;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CursoResource extends Resource
{
    protected static ?string $model = Curso::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-library';

    protected static ?string $navigationLabel = 'Curso';

    protected static ?string $navigationGroup = 'Centros';

    protected static ?int $navigationSort = 8;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()

                ->schema([
                    Forms\Components\Section::make('Datos')
                    ->schema([
                        Forms\Components\TextInput::make('curso')
                        ->label('Nombre del curso')
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
                        Forms\Components\Select::make('cicloformativo_id')
                            ->label('Ciclo formativo')
                            ->relationship('cicloformativo','nombre'),
                        Forms\Components\Select::make('user_id')
                            ->label('Tutor del ciclo')
                            ->relationship('User','name')
                            ->unique(ignoreRecord: true),
                        Forms\Components\TextInput::make('duracion')
                            ->label('Duración del curso'),

                    ]),
                        ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('curso')
                ->label('Nombre del curso')
                ->sortable(),
                Tables\Columns\TextColumn::make('descripcion')
                ->toggleable(isToggledHiddenByDefault: false)
                ->label('Descripción'),
                Tables\Columns\TextColumn::make('cicloformativo.nombre')
                ->toggleable()
                ->label('Ciclo Formativo')
                ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                ->toggleable()
                ->label('Tutor del ciclo')
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
            ModuloRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCursos::route('/'),
            'create' => Pages\CreateCurso::route('/create'),
            'edit' => Pages\EditCurso::route('/{record}/edit'),
        ];
    }
}
