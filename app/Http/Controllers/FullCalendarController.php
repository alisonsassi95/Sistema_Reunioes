<?php

namespace App\Http\Controllers;

use App\FastEvent;
use Illuminate\Http\Request;

class FullCalendarController extends Controller
{
    public function index(Request $request)
    {
        $fastEvents = FastEvent::all();
        // Restringir por usuário
        return view('fullcalendar.views.calendar', ['fastEvents' => $fastEvents]);
    }
    
    public function eventADM(Request $request)
    {
        $fastEvents = FastEvent::all();

        return view('fullcalendar.views.calendar', ['fastEvents' => $fastEvents]);
    }

}
