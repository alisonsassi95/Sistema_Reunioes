<?php

namespace App\Http\Controllers;


use App\User;
use App\People;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // para usar o SQL
use Illuminate\Pagination\LengthAwarePaginator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sql = "SELECT 
        exams.id,
        paciente.name        as paciente,
        medico.name          as medico,
        DATE_FORMAT(exams.performed_date, '%d/%m/%Y %H:%i:%s') as dataRealizada,
        equipaments.name     as TipoEquipaments,
        exams.status 
        FROM exams
        LEFT JOIN peoples paciente  ON paciente.id = exams.patients_id
        LEFT JOIN peoples medico    ON medico.id = exams.doctor_performer_id
        LEFT JOIN schedules         ON schedules.id = exams.id_schedules_exam
        LEFT JOIN equipaments       ON equipaments.id = schedules.equipament_id
        WHERE schedules.start_date > CURDATE()";
        // Adicionar o PAGINATE Deve usar o use Illuminate\Pagination\LengthAwarePaginator;
        $page = 1;
        $size = 20;
        $data = DB::select($sql);
        $collect = collect($data);
        $results = new LengthAwarePaginator($collect->forPage($page, $size),$collect->count(), $size, $page);
        // Fim do Adicionar o PAGINATE

        $Usuarios = DB::select('SELECT * FROM users');  
        $paciente = DB::select('SELECT * FROM peoples WHERE peoples.profile = 4');
        $medico = DB::select('SELECT * FROM peoples WHERE peoples.profile = 3');
        $funcionario = DB::select('SELECT * FROM peoples WHERE peoples.profile = 2');
        $ExamesCancelados = DB::select('SELECT * FROM exams WHERE exams.status = "Cancelado"');
        $ExamesAgendado = DB::select('SELECT * FROM exams WHERE exams.status = "Agendado"');
        $ExamesRealizado = DB::select('SELECT * FROM exams WHERE exams.status = "Realizado"');
        $ExamesSolicitado = DB::select('SELECT * FROM exams WHERE exams.status = "Solicitado"');
        
        
        
        return view('home', [
            'Usuarios' => $Usuarios,
            'paciente' => $paciente,
            'medico' => $medico,
            'funcionario' => $funcionario,
            'results' => $results,
            'ExamesCancelados' => $ExamesCancelados,
            'ExamesAgendado' => $ExamesAgendado,
            'ExamesRealizado' => $ExamesRealizado,
            'ExamesSolicitado' => $ExamesSolicitado,

            ]);
    }
}
