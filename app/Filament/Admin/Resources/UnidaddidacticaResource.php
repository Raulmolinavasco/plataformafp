<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\UnidaddidacticaResource\Pages;
use App\Filament\Resources\UnidaddidacticaResource\RelationManagers;
use App\Models\Unidaddidactica;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use function Laravel\Prompts\select;

class UnidaddidacticaResource extends Resource
{
    protected static ?string $model = Unidaddidactica::class;

    protected static ?string $navigationIcon = 'heroicon-o-inbox-stack';

    protected static ?string $navigationLabel = 'Unidad Didactica';

    protected static ?string $navigationGroup = 'Programaciones';

    protected static ?int $navigationSort = 13;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Unidades didacticas')
                ->description('unidades didacticas')
                ->schema([
                        Forms\Components\TextInput::make('nombre')
                        ->label('Nombre')
                        ->required()
                        ->unique(ignoreRecord: true),
                        Forms\Components\MarkdownEditor::make('descripcion')
                        ->label('Descripción'),
                    ])->columnSpan(2)->columns(2),

                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Relaciones')
                        ->schema([
                        Forms\Components\Select::make('modulo_id')
                            ->label('Modulos Inscritos')
                            ->relationship('modulo','nombre'),
                        ]),
                        ])->columns(2),
            ])->columns([
                'default' => 3,
                'sm' => 3,
                'md' => 3,
                'lg' => 3,

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')
                ->label('Nombre de la unidad')
                ->sortable(),
                Tables\Columns\TextColumn::make('descripcion')
                ->label('Descripcion')
                ->sortable(),
                Tables\Columns\TextColumn::make('modulo.nombre')
                ->toggleable()
                ->label('Modulo')
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
            'index' => Pages\ListUnidaddidacticas::route('/'),
            'create' => Pages\CreateUnidaddidactica::route('/create'),
            'edit' => Pages\EditUnidaddidactica::route('/{record}/edit'),
        ];
    }
}
