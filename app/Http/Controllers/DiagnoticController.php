<?php

namespace App\Http\Controllers;

use App\Exam;
use App\People;
use App\Diagnotic;
use Illuminate\Http\Request;
use App\Requests\LaudoRequest;
use Illuminate\Support\Facades\DB; // para usar o SQL
use Illuminate\Pagination\LengthAwarePaginator;
use Alert;

class DiagnoticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

        $Exam = Exam::find($id);
        $Laudo = DB::select("SELECT * FROM diagnotics WHERE diagnotics.exam_id = 6");
        
        return view('diagnostic.index', [
            'Exam'=>$Exam,
            'Laudo'=>$Laudo,

            ]);
    }

    /**
     * Função Responsavel por salvar um novo laudo no banco.
     */
    public function save(\App\Requests\LaudoRequest $request)
    {

        $insert = Diagnotic::create($request->all());

        return redirect()
                ->route('diagnostic.view', $request->exam_id)
                ->with('Laudo Cadastrado com sucesso');
    }

    /**
     * Método Add é um método que busca apartir de um ID vindo do Exame, para mandar os dados para salvar
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add($id)
    {
        
        $Exam = Exam::find($id);
        //$existe = DB::select("SELECT * FROM diagnotics WHERE diagnotics.exam_id = $id");
        $paciente = DB::select("SELECT distinct * FROM peoples 
                                LEFT JOIN exams ON exams.patients_id = peoples.id 
                                WHERE exams.id = $id");
        
        $medico = DB::select("SELECT distinct * FROM peoples 
                              LEFT JOIN exams ON exams.doctor_performer_id = peoples.id 
                              WHERE exams.id = $id");
        
        $DataExame = DB::select("SELECT distinct DATE_FORMAT(exams.performed_date, '%d/%m/%Y %H:%i:%s') as d
                                 FROM exams WHERE exams.id = $id");
        
        return view('diagnostic.add', [
            'medico' => $medico,
            'paciente' => $paciente,
            'DataExame' => $DataExame,
            'Exam'=>$Exam,
            ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Diagnotic  $diagnotic
     * @return \Illuminate\Http\Response
     */
    public function saveEdit(\App\Requests\LaudoRequest $request)
    {
        $diagnostic = Diagnotic::where('exam_id',$request->exam_id)->first();
        $diagnostic->status = $request->status;
        $diagnostic->diagnostic = $request->diagnostic;
        $diagnostic->save();
        return redirect()
                ->route('diagnostic.view', $request->exam_id)
                ->with('Laudo Cadastrado com sucesso');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Diagnotic  $diagnotic
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $medic = Exam::leftJoin('peoples', 'exams.doctor_performer_id', '=', 'peoples.id')
            ->where('exams.id', $id)
            ->first();
    
        $exam = Exam::leftJoin('peoples', 'exams.patients_id', '=', 'peoples.id')
            ->where('exams.id', $id)
            ->first();

        $diagnostic = Diagnotic::where('exam_id', $id)->first();

        return view('diagnostic.edit', [
            'diagnostic'=>$diagnostic,
            'exam' => $exam,
            'medic' => $medic
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Diagnotic  $diagnotic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Diagnotic $diagnotic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Diagnotic  $diagnotic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Diagnotic $diagnotic)
    {
        //
    }

    public function view($id)
    {
        $test = Diagnotic::where('exam_id', $id)->first();
        
        if(($test===null)==true){
            Alert::error('Ainda não possui laudo!');
            return redirect() 
                    ->back();
        }
        else{

        $medic = Exam::leftJoin('peoples', 'exams.doctor_performer_id', '=', 'peoples.id')
            ->where('exams.id', $id)
            ->first();
    
        $exam = Exam::leftJoin('peoples', 'exams.patients_id', '=', 'peoples.id')
            ->where('exams.id', $id)
            ->first();
        $diagnostic = Diagnotic::where('exam_id', $id)->first();

        return view('diagnostic.view', [
            'diagnostic'=>$diagnostic,
            'exam' => $exam,
            'medic' => $medic
        ]);

        }
        
    }

    public function print($id)
    {

        $medic = Exam::leftJoin('peoples', 'exams.doctor_performer_id', '=', 'peoples.id')
            ->where('exams.id', $id)
            ->first();
    
        $exam = Exam::leftJoin('peoples', 'exams.patients_id', '=', 'peoples.id')
            ->where('exams.id', $id)
            ->first();
        $diagnostic = Diagnotic::where('exam_id', $id)->first();

        return view('diagnostic.print', [
            'diagnostic'=>$diagnostic,
            'exam' => $exam,
            'medic' => $medic
        ]);
    }

}
