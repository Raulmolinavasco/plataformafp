<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\TipocicloResource\Pages;
use App\Filament\Resources\TipocicloResource\RelationManagers;
use App\Models\Tipociclo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TipocicloResource extends Resource
{
    protected static ?string $model = Tipociclo::class;

    protected static ?string $navigationIcon = 'heroicon-o-numbered-list';

    protected static ?string $navigationLabel = 'Tipo de ciclo formativo';

    protected static ?string $navigationGroup = 'Centros';

    protected static ?int $navigationSort = 7;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
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

                ]),
            ]);
        }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')
                ->label('Nombre')
                ->sortable(),
                Tables\Columns\TextColumn::make('descripcion')
                ->toggleable(isToggledHiddenByDefault: false)
                ->label('Descripción'),
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
            'index' => Pages\ListTipociclos::route('/'),
            'create' => Pages\CreateTipociclo::route('/create'),
            'edit' => Pages\EditTipociclo::route('/{record}/edit'),
        ];
    }
}
