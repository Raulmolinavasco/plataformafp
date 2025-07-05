<?php

namespace App\Filament\Admin\Pages;

use App\Models\Instituto;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Relations\Concerns\InteractsWithPivotTable;
use Illuminate\Foundation\Auth\User;

class Institutotable extends Page implements HasTable
{
    use InteractsWithTable;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationLabel = 'Instituto';

    protected static string $view = 'filament.admin.pages.institutotable';

    public ?array $data = [];

    public function mount()
    {
        $this->form->fill();
    }
    public function form(Form $form): Form
    {
        return $form->schema([
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

        ])->statePath('data');
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(Instituto::query())
            ->columns([
                TextColumn::make('nombre')
                ->label('Nombre')
                ->sortable(),
                TextColumn::make('direccion')
                ->toggleable(isToggledHiddenByDefault: true)
                ->label('Dirección'),
                TextColumn::make('ciudad')
                ->toggleable(isToggledHiddenByDefault: true)
                ->label('Ciudad'),
                TextColumn::make('provincia')
                ->label('Provincia'),
                TextColumn::make('codigopostal')
                ->toggleable(isToggledHiddenByDefault: true)
                ->label('Código Postal'),
                TextColumn::make('telefono')
                ->label('Telefóno'),
                TextColumn::make('codigocentro')
                -> label('Código de Centro')
                ->sortable(),
                TextColumn::make('create_at')
                ->label('Creado')
                ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                ->label('Actualizado')
                ->toggleable(isToggledHiddenByDefault: true),
            ]);
    }
    public function getFormActions()
    {
        return [
            Forms\Components\Actions\Action::make('submit')
                ->submit('submit')
        ];
    }
    public function submit()
    {
        $data = $this->form->getState();
        Instituto::create($data);
        Notification::make()
            ->success()
            ->title('Creado')
            ->send();
    }
}
