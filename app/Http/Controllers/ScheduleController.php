<?php

namespace App\Http\Controllers;

use App\Schedule;
use App\Exam;
use App\Http\Controllers\Auth;
use App\Requests\ScheduleRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
use Illuminate\Support\Facades\DB; // para usar o SQL
use Alert;

class ScheduleController extends Controller
{
    public function createEvent()
    {

        $funcionario = DB::select('SELECT * FROM peoples WHERE peoples.profile = 2');
        $medico = DB::select('SELECT * FROM peoples WHERE peoples.profile = 3');
        $paciente = DB::select('SELECT * FROM peoples WHERE peoples.profile = 4');
        $equipamento = DB::select('SELECT * FROM equipaments');

        return view('createevent', [ 
            'funcionario' => $funcionario,
            'medico' => $medico,
            'paciente' => $paciente,
            'equipamento' => $equipamento,
            ]);
    }

 //------------------- Termina parte Agendamento do Cliente--------------------------------

    public function createEventCliente()
    {
        $funcionario = DB::select('SELECT * FROM peoples WHERE peoples.profile = 2');
        $medico = DB::select('SELECT * FROM peoples WHERE peoples.profile = 3');
        $equipamento = DB::select('SELECT * FROM equipaments');

        return view('createEventCliente', [ 
            'funcionario' => $funcionario,
            'medico' => $medico,
            'equipamento' => $equipamento,
            ]);
    }



    //Registro da criação do evento
    public function storeClient(ScheduleRequest $request)
    {
        if(($request)->all()){
        $event= new Schedule();
        $event->title=$request->get('title');
        $event->start_date=$request->get('startdate');
        $event->end_date=$request->get('enddate');
        $event->note=$request->get('note');
        $event->doctor_requests_id=$request->get('doctor_requests_id');
        $event->patients_id=$request->get('patients_id');
        $event->equipament_id=$request->get('equipament_id');
        $event->convenant=$request->get('convenant');
        
        // verificar a data e hora
        $event->save();
        Alert::success('Adicionado com Sucesso!');
        DB::INSERT("INSERT INTO exams(scheduled_date, patients_id,id_schedules_exam, status) 
                    VALUES ('$event->start_date',
                            $event->patients_id,
                            $event->id,
                            'Solicitado');");
        
        Alert::success('Adicionado com Sucesso!');
        return redirect('/ExamesPaciente');

        }else{
            Alert::error('Falha ao Agendar');
            return redirect() 
                    ->back();
        }
    }

 //------------------- Termina parte Agendamento do Cliente--------------------------------

//Função responsável por armazenar  os dados do Agendamento no banco
public function store(Request $request)
    {
        $event= new Schedule();
        $event->title=$request->get('title');
        $event->start_date=$request->get('startdate');
        $event->end_date=$request->get('enddate');
        $event->note=$request->get('note');
        $event->doctor_requests_id=$request->get('doctor_requests_id');
        $event->patients_id=$request->get('patients_id');
        $event->equipament_id=$request->get('equipament_id');
        $event->convenant=$request->get('convenant');
        
        // verificar a data e hora
        
        $event->save();
        try{
         DB::INSERT("INSERT INTO exams(scheduled_date, patients_id,id_schedules_exam, status) 
                    VALUES ('$event->start_date',
                            $event->patients_id,
                            $event->id,
                            'Agendado');");
        }catch(Exception $e){
            Echo('Erro ao inserir');
        }
        return redirect('event')->with('Agendado', 'Agendado Com Sucesso!');
    }
    //Função responsável por inicializar evento no calendário
public function calender()
            {
                $events = [];
                $data = Schedule::all();
                if($data->count())
                 {
                    
                    foreach ($data as $key => $value) 
                    {
                        $equip = $value->equipament_id;
                        $events[] = Calendar::event(
                            $value->title,
                            false,
                            new \DateTime($value->start_date),
                            new \DateTime($value->end_date),
                            null,
                            
                         [
                             'color' => 'yellow',
                             'textColor' => '#008000',
                         ]
                        );
                    }
                }
                $calendar = Calendar::addEvents($events);
                return view('calendar', compact('calendar'));
            }
}
