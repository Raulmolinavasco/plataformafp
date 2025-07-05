<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\DepartamentoResource\Pages;
use App\Filament\Admin\Resources\DepartamentoResource\RelationManagers\CicloformativoRelationManager;
use App\Filament\Admin\Resources\DepartamentoResource\RelationManagers\ProfesoresRelationManager;
use App\Filament\Admin\Resources\UserResource\RelationManagers\ProfesorRelationManager;
use App\Filament\Resources\DepartamentoResource\RelationManagers;
use App\Filament\Resources\InstitutoResource\RelationManagers\DepartamentoRelationManager;
use App\Models\Departamento;
use App\Models\Profesor;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Group;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\Relationship;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use NunoMaduro\Collision\Adapters\Phpunit\State;

class DepartamentoResource extends Resource
{
    protected static ?string $model = Departamento::class;

    protected static ?string $navigationIcon = 'heroicon-o-home-modern';

    protected static ?string $navigationLabel = 'Departamentos';

    protected static ?string $navigationGroup = 'Centros';

    protected static ?int $navigationSort = 4;

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
                        ->live()
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

                            Forms\Components\Select::make('instituto_id')
                            ->label('Instituto')
                            ->relationship('instituto','nombre'),
                            Forms\Components\Select::make('jefedepartamento_id')
                            ->label('Jefe de departamento')
                            ->relationship('profesores','nombre',modifyQueryUsing: function(Builder $query,Get $get){
                               // dd($get('id'));
                                $query->where('departamento_id',$get('id'));
                                return $query;})
                                ->disabledOn('create'),

                    ]),
                        ])->columns(2),
                    ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')
                ->label('Nombre')
                ->sortable(),
                Tables\Columns\TextColumn::make('descripcion')
                ->toggleable(isToggledHiddenByDefault: true)
                ->label('Descripción'),
                Tables\Columns\TextColumn::make('instituto.nombre')
                ->toggleable()
                ->label('Instituto'),
               /* Tables\Columns\TextColumn::make('profesor.id')
                ->label('Jefe de Departamento'),*/
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
            CicloformativoRelationManager::class,
            ProfesoresRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDepartamentos::route('/'),
            'create' => Pages\CreateDepartamento::route('/create'),
            'edit' => Pages\EditDepartamento::route('/{record}/edit'),
        ];
    }
}
