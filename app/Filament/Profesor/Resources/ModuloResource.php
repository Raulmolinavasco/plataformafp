<?php

namespace App\Filament\Profesor\Resources;

use App\Filament\Profesor\Resources\ModuloResource\Pages;
use App\Filament\Resources\ModuloResource\RelationManagers;
use App\Models\Modulo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ModuloResource extends Resource
{

    protected static ?string $model = Modulo::class;

    protected static ?string $navigationIcon = 'heroicon-m-truck';

    protected static ?string $navigationLabel = 'Modulos';

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
                        Forms\Components\TextInput::make('codigo')
                        ->label('Código'),
                        Forms\Components\TextInput::make('nombre')
                        ->label('Nombre del módulo')
                        ->required()
                        ->unique(ignoreRecord: true),
                        Forms\Components\MarkdownEditor::make('descripcion')
                        ->label('Descripción'),
                        Forms\Components\TextInput::make('horas')
                        ->label('Horas'),
                        Forms\Components\TextInput::make('horas_semanales')
                        ->label('Horas semanales'),
                    ]),
                ]),

                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Relaciones')
                        ->schema([
                        Forms\Components\Select::make('curso_id')
                            ->label('Curso')
                            ->relationship('curso','curso'),
                    ]),
                        ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('codigo')
                ->label('codigo del módulo')
                ->sortable(),
                Tables\Columns\TextColumn::make('nombre')
                ->label('Nombre del módulo')
                ->sortable(),
                Tables\Columns\TextColumn::make('descripcion')
                ->label('Descripcion')
                ->sortable(),
                Tables\Columns\TextColumn::make('curso.curso')
                ->toggleable()
                ->label('Curso')
                ->sortable(),
                Tables\Columns\TextColumn::make('horas')
                ->toggleable()
                ->label('Horas')
                ->sortable(),
                Tables\Columns\TextColumn::make('horas_semanales')
                ->toggleable()
                ->label('Horas semanales')
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
            'index' => Pages\ListModulos::route('/'),
            'create' => Pages\CreateModulo::route('/create'),
            'edit' => Pages\EditModulo::route('/{record}/edit'),
        ];
    }
/*
    public static function getEloquentQuery(): Builder
    {
        if (auth()->user()->hasRole('Admin')) {

            return parent::getEloquentQuery()->where('profesor.user.name',['Jesus Pacho']);
        };

        return parent::getEloquentQuery()->where('id', '11');
    }*/
}
