<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Curso;
use App\Models\Instituto;
use App\Models\Modulo;
use App\Models\Programacion;
use App\Models\User;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\IOFactory;
use Throwable;

class InformeController extends Controller
{
    public function Instituto()
    {
        $phpWord = new \PhpOffice\PhpWord\PhpWord();

        $section = $phpWord->addSection();

        $institutos = Instituto::All();

        $description = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod

tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,

quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo

consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse

cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non

proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";



        $section->addImage("images/favicon.png");

        $section->addText($institutos);



        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');

        try {

            $objWriter->save(storage_path('helloWorld.docx'));

        } catch (Throwable  $e) {

        }

        return response()->download(storage_path('helloWorld.docx'));

    }

    public function Programacion($record)
    {

        $programacion = Programacion::where('id',$record)->get();
        $moduloid = Modulo::where('id', $programacion[0]->modulo_id)->get();
        $profesor = User::where('id',$programacion[0]->user_id)->get();
        $curso = Curso::where('id',$moduloid[0]->curso_id)->get();
        //dd($moduloid[0]->nombre);
        $fileName = "programacion.docx";
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(storage_path('app/public/template/' . $fileName));

        $templateProcessor->setValue('modulo', $moduloid[0]->nombre);
        $templateProcessor->setValue('profesor', $profesor[0]->name);
        $templateProcessor->setValue('curso', $curso[0]->curso);

        $templateProcessor->saveAs(storage_path('programacion.docx'));

        return response()->download(storage_path('programacion.docx'));

        /*$phpWord = new \PhpOffice\PhpWord\PhpWord();



        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(storage_path('app/public/template/' . $fileName));

        $section = $phpWord->addSection();



        $description = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod

tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,

quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo

consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse

cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non

proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";



        $section->addImage("images/favicon.png");

        $section->addText($description);



        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');

        try {

            $objWriter->save(storage_path('Programacion.docx'));

        } catch (Throwable  $e) {

        }

        return response()->download(storage_path('Programacion.docx'));

    }*/
    }
}
