<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
use alert;

class EventController extends Controller
{
    //Função responsável por retornar a view do Criar Evento
public function createEvent()
    {
        return view('createevent');
    }
    //Função responsável por registrar os dados no banco de dados
public function store(Request $request)
    {
        $event= new Event();
        $event->title=$request->get('title');
        $event->start_date=$request->get('startdate');
        $event->end_date=$request->get('enddate');
        $event->save();
        return redirect('event')->with('success', 'Event has been added');
    }
    //Função responsável por definir os eventos no Calendário no mometno da exibição na view junto com css e js
public function calender()
            {
                $events = [];
                $data = Event::all();
                if($data->count())
                 {
                    
                    foreach ($data as $key => $value) 
                    {
                        
                        $events[] = Calendar::event(
                            $value->title,
                            false,
                            new \DateTime($value->start_date),
                            new \DateTime($value->end_date),
                            null,
                            // Add color
                         [
                             'color' => '#000000',
                             'textColor' => '#008900',
                         ]
                        );
                    }
                }
                $calendar = Calendar::addEvents($events);
                return view('calendar', compact('calendar'));
            }
}
