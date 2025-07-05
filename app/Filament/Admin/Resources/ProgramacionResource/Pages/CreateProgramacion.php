<?php

namespace App\Filament\Admin\Resources\ProgramacionResource\Pages;

use App\Filament\Admin\Resources\ProgramacionResource;
use App\Models\Profesor;
use App\Models\User;
use Filament\Actions;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard\Step;
use Filament\Resources\Pages\CreateRecord;

class CreateProgramacion extends CreateRecord
{
  //  use CreateRecord\Concerns\HasWizard;

    protected static string $resource = ProgramacionResource::class;

  /*  protected function getSteps(): array
    {
        return [
            Step::make('Datos generales')
            ->description('datos iniciales')
            ->schema([
                Select::make('modulo_id')
                ->label('Nombre del módulo')
                ->relationship('modulo','nombre'),
                MarkdownEditor::make('descripcion')
                ->label('Descripción general del módulo')
                ->required(),
                Select::make('user_id')
                ->label('Profesor del módulo')
                ->relationship('user','name'),

            ]),
            Step::make('Objetivo base')
            ->description('Objetivo base')
            ->schema([
                MarkdownEditor::make('objetivo base')
                ->label('Objetivo base')
                ->required(),
                MarkdownEditor::make('legislacion')
                ->label('Legislación')
                ->required(),
            ]),
            Step::make('Competencias y Objetivos')
            ->description('Competencias y Objetivos')
            ->schema([
                MarkdownEditor::make('competencias profesionales')
                ->label('Competencias profesionales, personales y sociales (Competencias profesionales y para la empleabilidad) relacionadas con el
                            módulo profesional')
                ->required(),
                MarkdownEditor::make('objetivos generales')
                ->label('Objetivos generales del ciclo formativo relacionados con el módulo profesional')
                ->required(),
            ]),
            Step::make('criterios de evaluacion')
            ->description('Resultados de aprendizaje y criterios de evaluación')
            ->schema([
                MarkdownEditor::make('criterios de evaluacion')
                ->label('Criterios de evaluacion')
                ->required(),
                Select::make('resultado de aprendizaje')
                ->multiple()
                ->label('resultado deaprendizaje')
                ->relationship('resultadoaprendizajes','nombre'),

            ]),
            Step::make('unidadestrabajo')
            ->description('Unidades de trabajo')
            ->schema([
                Repeater::make('members')
                ->schema([
                    Select::make('unidades de trabajo')
                    ->multiple()
                    ->label('unidades de trabajo')
                    ->relationship('unidaddidacticas','nombre'),
                    ])->columns(2),
                ]),
            Step::make('Asociar Resultados de aprendizaje a Unidades de trabajo')
            ->description('Asociar Resultados de aprendizaje a Unidades de trabajo')
            ->schema([

            ]),
            Step::make('Metodología y materiales')
            ->description('datos iniciales')
            ->schema([
                MarkdownEditor::make('metodologia')
                ->label('Metodología didáctica')
                ->required(),
                MarkdownEditor::make('materiales')
                ->label('Materiales y recursos didacticos')
                ->required(),

            ]),
            Step::make('Resultados de aprendizaje asociados y seguridad e higiene')
            ->description('Resultados de aprendizaje asociados y seguridad e higiene')
            ->schema([
                MarkdownEditor::make('ra asociados')
                ->label('Resultados de aprendizaje asociados')
                ->required(),
                MarkdownEditor::make('seguridad')
                ->label('Seguridad e Higiene')
                ->required(),
            ]),
            Step::make('Sostenibilidad y TIC')
            ->description('Sostenibilidad y TIC')
            ->schema([
                MarkdownEditor::make('sos')
                ->label('Sostenibilidad')
                ->required(),
                MarkdownEditor::make('tic')
                ->label('TIC')
                ->required(),
            ]),
            Step::make('Evaluación y calificación')
            ->description('Evaluacion y calificación')
            ->schema([

            ]),
            Step::make('PROCEDIMIENTOS DE EVALUACIÓN DEL APRENDIZAJE DEL ALUMNADO')
            ->description('PROCEDIMIENTOS DE EVALUACIÓN DEL APRENDIZAJE DEL ALUMNADO')
            ->schema([
                MarkdownEditor::make('procedimiento evaluacion')
                ->label('Procedimiento de evaluación')
                ->required(),
                    ]),
            Step::make('Calificación')
            ->description('Calificación')
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
                    ]),
            Step::make('Actividades de recuperación')
            ->description('ACTIVIDADES DE RECUPERACIÓN')
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

                                        ]),
            Step::make('RECLAMACIÓN DE CALIFICACIÓNES, EXTRAESCOLARES Y MEDIDAS DE ATENCIÓN A LA DIVERSIDAD')
            ->description('RECLAMACIÓN DE CALIFICACIÓNES Y EXTRAESCOLARES')
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
                                                ]),
        ];
    }*/
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
