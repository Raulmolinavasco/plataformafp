<?php

namespace App\Filament\Admin\Resources;

use AnourValar\EloquentSerialize\Tests\Models\Post;
use App\Filament\Admin\Resources\ProgramacionResource\Pages;
use App\Filament\Admin\Resources\ProgramacionResource\Pages\CreateProgramacion;
use App\Filament\Admin\Resources\ProgramacionResource\Pages\EditProgramacion;
use App\Filament\Admin\Resources\ProgramacionResource\Pages\ListProgramacions;
use App\Filament\Admin\Resources\ProgramacionResource\RelationManagers;
use App\Filament\Admin\Resources\ProgramacionResource\RelationManagers\UnidaddidacticasRelationManager;
use App\Models\Modulo;
use App\Models\Programacion;
use App\Models\Resultadoaprendizaje;
use App\Models\Unidaddidactica;
use Awcodes\TableRepeater\Components\TableRepeater;
use Awcodes\TableRepeater\Header;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ViewField;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\HtmlString;
use NunoMaduro\Collision\Adapters\Phpunit\State;

class ProgramacionResource extends Resource
{
    protected static ?string $model = Programacion::class;

    protected static ?string $navigationIcon = 'heroicon-m-newspaper';

    protected static ?string $navigationLabel = 'Programacion';

    protected static ?string $navigationGroup = 'Programaciones';

    protected static ?int $navigationSort = 14;

    Protected ?bool $visible = false;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                Wizard\Step::make('Datos generales')
                        ->schema([
                Select::make('modulo_id')
                ->label('Nombre del módulo')
                ->relationship('modulo','nombre')
                ->reactive(),
                MarkdownEditor::make('descripcion')
                ->label('Descripción general del módulo')
                ->required(),
                Select::make('user_id')
                ->label('Profesor del módulo')
                ->relationship('user','name'),
                            // ...
                        ])->completedIcon('heroicon-m-hand-thumb-up'),
                    Wizard\Step::make('Objetivo base')
                        ->schema([
                            MarkdownEditor::make('objetivo base')
                            ->label('Objetivo base')
                            ->required(),
                            MarkdownEditor::make('legislacion')
                            ->label('Legislación')
                            ->required(),
                        ])->completedIcon('heroicon-m-hand-thumb-up'),
                    Wizard\Step::make('Competencias y objetivos')
                        ->schema([
                            MarkdownEditor::make('competencias profesionales')
                            ->label('Competencias profesionales, personales y sociales (Competencias profesionales y para la empleabilidad) relacionadas con el
                                        módulo profesional')
                            ->required(),
                            MarkdownEditor::make('objetivos generales')
                            ->label('Objetivos generales del ciclo formativo relacionados con el módulo profesional')
                            ->required(),
                        ])->completedIcon('heroicon-m-hand-thumb-up'),
                        Wizard\Step::make('Criterios de evaluación')
                        ->schema([
                            MarkdownEditor::make('criterios de evaluacion')
                            ->label('Criterios de evaluacion')
                            ->required(),
                          /*  Select::make('resultado de aprendizaje')
                            ->multiple()
                            ->label('resultado deaprendizaje')
                            ->relationship('resultadoaprendizajes','nombre'),*/
                        ])->completedIcon('heroicon-m-hand-thumb-up'),



                        Wizard\Step::make('Unidades de trabajo')
                        ->schema([
                        TableRepeater::make('unidaddidacticas')
                        ->relationship()
                            ->headers([
                                Header::make('nombre')->width('150px'),
                                Header::make('descripcion')->width('150px'),
                                Header::make('Modulo inscrito')->width('150px'),
                            ])
                            ->schema([
                        Forms\Components\TextInput::make('nombre')
                        ->hiddenLabel('Nombre')
                        ->required()
                        ->unique(ignoreRecord: true),

                        Forms\Components\MarkdownEditor::make('descripcion')
                        ->hiddenLabel('Descripción'),

                        Forms\Components\Select::make('modulo_id')
                            ->hiddenLabel('Modulos Inscritos')
                            ->relationship('modulo','nombre'),


                            ])
                            ->columnSpan('full'),
                        ])->completedIcon('heroicon-m-hand-thumb-up'),

                          //   \app\Filament\Admin\Resources\ProgramacionResource\RelationManagers\UnidaddidacticasRelationManager::table(new Tables\Table),
                          //  \app\Filament\Admin\Resources\ProgramacionResource\RelationManagers\UnidaddidacticasRelationManager::table(new Tables\Table())


/*                        Wizard\Step::make('Unidades de trabajo')
                        ->schema([
                            Repeater::make('unidades de trabajo')
                                ->relationship('unidaddidacticas') // Relación con la tabla Tareas
                                ->schema([
                                    Select::make('unidaddidactica_id')
                                        ->label('Unidad didactica')
                                        ->options(Unidaddidactica::all()->pluck('nombre', 'id'))
                                        ->searchable()
                                        ->required(),

                                ])
                                ->deletable(true)
                                ->defaultItems(1)
                                ->columns(2),
                        ])->completedIcon('heroicon-m-hand-thumb-up'),


Wizard\Step::make('Prueba')
->schema([

            Forms\Components\Repeater::make('unidaddidacticas')
                ->relationship('unidaddidacticas')
                ->schema([
                    Forms\Components\Select::make('nombre')
                        ->label('Unidad Didáctica')
                        ->options(UnidadDidactica::all()->pluck('nombre'))
                        ->required(),

                    Forms\Components\Repeater::make('resultadoaprendizajes')
                        ->schema([
                            Forms\Components\Select::make('nombre')
                                ->label('Resultado de Aprendizaje')
                                ->options(ResultadoAprendizaje::all()->pluck('nombre'))
                                ->required(),
                            TextInput::make('porcentaje')
                            ->numeric(),
                        ]),
                ])
                ->columns(2),
])->completedIcon('heroicon-m-hand-thumb-up'),

*/



                        Wizard\Step::make('Asociar Resultados de aprendizaje a Unidades de trabajo')
                        ->schema([

                            TableRepeater::make('unidad_resultados')
                        ->relationship()
                            ->headers([
                                //Header::make('programacion_id')->width('150px'),
                                Header::make('unidaddidactica_id')->width('250px'),
                                Header::make('Ra1')->width('90px'),
                                Header::make('Ra2')->width('90px'),
                                Header::make('Ra3')->width('90px'),
                                Header::make('Ra4')->width('90px'),
                                Header::make('Ra5')->width('90px'),
                                Header::make('Ra6')->width('90px'),
                                Header::make('Ra7')->width('90px'),
                                Header::make('Ra8')->width('90px'),
                                Header::make('Ra9')->width('90px'),
                                Header::make('Ra10')->width('90px'),
                               // Header::make('Porcentaje')->width('150px'),
                               ])
                            ->schema([
                             /*   TextInput::make('programacion_id')
                                ->hiddenLabel('programacion_id'),*/

                                Select::make('unidaddidactica_id')
                                ->hiddenLabel('unidaddidactica_id')
                                ->options(function(callable $get){
                                    $unidaddidactica = Unidaddidactica::where('modulo_id', $get('modulo_id'));
                                    if(! $unidaddidactica){
                                        return Unidaddidactica::all()->pluck('nombre', 'id');
                                    }
                                    return $unidaddidactica->pluck('nombre', 'id');
                                }
                                    //Unidaddidactica::where('modulo_id','19')->pluck('nombre', 'id')
                                    )
                                ->searchable()
                                ->required(),
                                TextInput::make('ra1')
                                ->hiddenLabel('ra1')
                                ->default('0'),

                                TextInput::make('ra2')
                                ->hiddenLabel('ra2')
                                ->default('0'),

                                TextInput::make('ra3')
                                ->hiddenLabel('ra3')
                                ->default('0'),

                                TextInput::make('ra4')
                                ->hiddenLabel('ra4')
                                ->default('0'),

                                TextInput::make('ra5')
                                ->hiddenLabel('ra5')
                                ->default('0'),

                                TextInput::make('ra6')
                                ->hiddenLabel('ra6')
                                ->default('0'),

                                TextInput::make('ra7')
                                ->hiddenLabel('ra7')
                                ->default('0'),

                                TextInput::make('ra8')
                                ->hiddenLabel('ra8')
                                ->default('0'),

                                TextInput::make('ra9')
                                ->hiddenLabel('ra9')
                                ->default('0'),

                                TextInput::make('ra10')
                                ->hiddenLabel('ra10')
                                ->default('0'),

                                ])
                                ->columns(2)
                           /*     TableRepeater::make('resultadoaprendizaje_id')
                                ->headers([
                                    //Header::make('programacion_id')->width('150px'),
                                    Header::make('resultado de apredizaje')->width('150px'),
                                    //Header::make('Porcentaje')->width('150px'),
                                   ])
                                   ->schema([
                                Select::make('resultadoaprendizaje_id')
                                ->hiddenLabel('resultadoaprendizaje_id')
                                ->options(Resultadoaprendizaje::all()->pluck('nombre','id'))
                                ->searchable()
                                ->required(),
                               /* TextInput::make('porcentaje')
                                ->hiddenLabel('resultadoaprendizaje_id')
                                ->required(),
                                ])->columnSpan('full'),

                                ])->columnSpan('full'),*/
                        ])->completedIcon('heroicon-m-hand-thumb-up'),




                        Wizard\Step::make('Metodología y materiales')
                        ->schema([
                            MarkdownEditor::make('metodologia')
                            ->label('Metodología didáctica')
                            ->required(),
                            MarkdownEditor::make('materiales')
                            ->label('Materiales y recursos didacticos')
                            ->required(),
                        ])->completedIcon('heroicon-m-hand-thumb-up'),
                        Wizard\Step::make('Resultados de apredizajes asociados y seguridad e higiene')
                        ->schema([
                            MarkdownEditor::make('ra asociados')
                            ->label('Resultados de aprendizaje asociados')
                            ->required(),
                            MarkdownEditor::make('seguridad')
                            ->label('Seguridad e Higiene')
                            ->required(),
                        ])->completedIcon('heroicon-m-hand-thumb-up'),
                        Wizard\Step::make('Sostenibilidad y TIC')
                        ->schema([
                            MarkdownEditor::make('sos')
                            ->label('Sostenibilidad')
                            ->required(),
                            MarkdownEditor::make('tic')
                            ->label('TIC')
                            ->required(),
                        ])->completedIcon('heroicon-m-hand-thumb-up'),
                        Wizard\Step::make('Evaluación y calificación')
                        ->schema([

                        ])->completedIcon('heroicon-m-hand-thumb-up'),
                        Wizard\Step::make('PROCEDIMIENTOS DE EVALUACIÓN DEL APRENDIZAJE DEL ALUMNADO')
                        ->schema([
                            MarkdownEditor::make('procedimiento evaluacion')
                            ->label('Procedimiento de evaluación')
                            ->required(),
                        ])->completedIcon('heroicon-m-hand-thumb-up'),
                        Wizard\Step::make('Calificación')
                        ->schema([
                            MarkdownEditor::make('calificacion 0')
                            ->label('calificación')
                            ->required(),
                            MarkdownEditor::make('evaluacion continua')
                            ->label('CALIFICACIÓN EVALUACIÓN CONTINUA')
                            ->required(),
                            MarkdownEditor::make('calificacion 1')
                            ->label('CALIFICACIÓN 1º evaluación (diciembre)')
                            ->required(),
                            MarkdownEditor::make('calificacion 2')
                            ->label('CALIFICACIÓN 2º evaluación (febrero)')
                            ->required(),
                        ])->completedIcon('heroicon-m-hand-thumb-up'),
                        Wizard\Step::make('Actividades de recuperación')
                        ->schema([
                            MarkdownEditor::make('rec evaluacion continua')
                            ->label('Procedimiento de evaluación')
                            ->required(),
                            MarkdownEditor::make('rec primera evaluacion')
                            ->label('ALUMNOS CON EL MÓDULO PROFESIONAL NO SUPERADO DESPUÉS DE LA PRIMERA EVALUACIÓN FINAL')
                            ->required(),

                            MarkdownEditor::make('rec parcial')
                            ->label('ALUMNOS CON EVALUACIÓN PARCIAL SUSPENSA')
                            ->required(),
                        ])->completedIcon('heroicon-m-hand-thumb-up'),
                        Wizard\Step::make('RECLAMACIÓN DE CALIFICACIÓNES, EXTRAESCOLARES Y MEDIDAS DE ATENCIÓN A LA DIVERSIDAD')
                        ->schema([
                            MarkdownEditor::make('reclamacion')
                            ->label('RECLAMACIÓN DE CALIFICACIÓNES')
                            ->required(),
                            MarkdownEditor::make('extraescolares')
                            ->label('ACTIVIDADES COMPLEMENTARIAS Y EXTRAESCOLARES')
                            ->required(),
                            MarkdownEditor::make('medidas')
                            ->label('MEDIDAS DE ATENCIÓN A LA DIVERSIDAD')
                            ->required(),
                        ])->completedIcon('heroicon-m-hand-thumb-up'),

                        ])->skippable()->submitAction(new HtmlString(Blade::render(<<<BLADE
                                        <x-filament::button
                                            type="submit"
                                            size="sm"
                                        >
                                            Crear
                                        </x-filament::button>
                                    BLADE))),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('modulo.nombre')
                ->label('Programacion')
                ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
                Action::make('Programación')
                ->url(fn($record):string => route('Informe.programacion',$record))
                ->icon('heroicon-m-pencil-square')
                ->color('info')
                ->button(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                   DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            UnidaddidacticasRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProgramacions::route('/'),
            'create' => Pages\CreateProgramacion::route('/create'),
            'edit' => Pages\EditProgramacion::route('/{record}/edit'),
        ];
    }
}
