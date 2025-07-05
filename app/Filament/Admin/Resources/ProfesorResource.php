<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ProfesorResource\Pages;
use App\Filament\Admin\Resources\ProfesorResource\RelationManagers;
use App\Models\Profesor;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class ProfesorResource extends Resource
{
    protected static ?string $model = Profesor::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    protected static ?string $navigationLabel = 'Profesor';

    protected static ?string $navigationGroup = 'Centros';

    protected static ?int $navigationSort = 9;

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
                            ->reactive()
                            ->afterStateUpdated(fn ($state, Set $set) => $set('nombre',User::find($state)?->name,))
                            ->afterStateUpdated(fn ($state, Set $set) => $set('email',User::find($state)?->email,))
                            ->relationship('user','name')
                            ->live(),
                        Forms\Components\Hidden::make('nombre')
                            ->default('0'),
                        Forms\Components\Hidden::make('email')
                            ->default('0'),
                        Forms\Components\Select::make('departamentos')
                            ->label('Departamento')
                            ->multiple()
                            ->relationship('departamentos','nombre'),
                        Forms\Components\Select::make('modulos')
                            ->label('Modulos')
                            ->multiple()
                            ->relationship('modulos','nombre'),
                    ]),
                        ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                ->label('Nombre del profesor')
                ->sortable(),
                Tables\Columns\TextColumn::make('departamentos.nombre')
                ->toggleable()
                ->label('Departamento')
                ->sortable(),
                Tables\Columns\TextColumn::make('modulos.nombre')
                ->toggleable()
                ->label('Modulos')
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
            'index' => Pages\ListProfesors::route('/'),
            'create' => Pages\CreateProfesor::route('/create'),
            'edit' => Pages\EditProfesor::route('/{record}/edit'),
        ];
    }


}
