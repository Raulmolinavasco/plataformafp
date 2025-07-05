<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\AlumnoResource\Pages;
use App\Filament\Resources\AlumnoResource\RelationManagers;
use App\Models\Alumno;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AlumnoResource extends Resource
{
    protected static ?string $model = Alumno::class;

    protected static ?string $navigationIcon = 'heroicon-c-user-minus';

    protected static ?string $navigationLabel = 'Alumnos';

    protected static ?string $navigationGroup = 'Centros';

    protected static ?int $navigationSort = 10;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Relaciones')
                        ->schema([
                        Forms\Components\Select::make('user_id')
                            ->label('Usuario')
                            ->relationship('user','name')
                            ->unique(ignoreRecord: true),
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
                Tables\Columns\TextColumn::make('user.name')
                ->label('Nombre del Alumno')
                ->sortable(),
                Tables\Columns\TextColumn::make('curso.curso')
                ->toggleable()
                ->label('Curso formativo')
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
            'index' => Pages\ListAlumnos::route('/'),
            'create' => Pages\CreateAlumno::route('/create'),
            'edit' => Pages\EditAlumno::route('/{record}/edit'),
        ];
    }
}
