<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\InstitutoResource\Pages;
use App\Filament\Resources\InstitutoResource\RelationManagers;
use App\Filament\Admin\Resources\InstitutoResource\RelationManagers\DepartamentoRelationManager;
use App\Models\Instituto;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use RelationManagers\InstitutoRelationManager;

class InstitutoResource extends Resource
{
    protected static ?string $model = Instituto::class;

    protected static ?string $navigationIcon = 'heroicon-o-bolt';

    protected static ?string $navigationLabel = 'Instituto';

    protected static ?string $navigationGroup = 'Centros';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                ->schema([
                    Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('nombre')
                        ->label('Nombre')
                        ->columnSpanFull()
                        ->required()
                        ->unique(ignoreRecord: true),
                        Forms\Components\TextInput::make('direccion')
                        ->label('Dirección')
                        ->columnSpanFull(),
                        Forms\Components\TextInput::make('ciudad')
                        ->label('Ciudad'),
                        Forms\Components\TextInput::make('provincia')
                        ->label('Provincia'),
                        Forms\Components\TextInput::make('codigopostal')
                        ->label('Coódigo Postal'),
                        Forms\Components\TextInput::make('telefono')
                        ->label('Teléfono'),
                        Forms\Components\TextInput::make('codigocentro')
                        ->label('Código de Centro')
                        ->required()
                        ->unique(ignoreRecord: true),
                    ])->columns(3)

                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')
                ->label('Nombre')
                ->sortable(),
                Tables\Columns\TextColumn::make('direccion')
                ->toggleable(isToggledHiddenByDefault: true)
                ->label('Dirección'),
                Tables\Columns\TextColumn::make('ciudad')
                ->toggleable(isToggledHiddenByDefault: true)
                ->label('Ciudad'),
                Tables\Columns\TextColumn::make('provincia')
                ->label('Provincia'),
                Tables\Columns\TextColumn::make('codigopostal')
                ->toggleable(isToggledHiddenByDefault: true)
                ->label('Código Postal'),
                Tables\Columns\TextColumn::make('telefono')
                ->label('Telefóno'),
                Tables\Columns\TextColumn::make('codigocentro')
                -> label('Código de Centro')
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
            DepartamentoRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInstitutos::route('/'),
            'create' => Pages\CreateInstituto::route('/create'),
            'edit' => Pages\EditInstituto::route('/{record}/edit'),
        ];
    }


}
