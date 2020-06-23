<?php

namespace App\Http\Controllers;


use App\User;
use App\Event;
use App\Meeting;
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
     
        $meeting = Event::all();
        $results = DB::select('SELECT
                                events.id as id, 
                                events.title as titulo, 
                                DATE_FORMAT(events.start , "%d/%m/%Y %H:%i:%s" ) as Data_Inicial,
                                DATE_FORMAT(events.end , "%d/%m/%Y %H:%i:%s" ) as Data_Final,
                                room.name sala,
                                events.condition as status,
                                events.priority as prioridade
                                FROM events
                                left join room ON room.id = events.room_id
                                WHERE events.start > CURDATE( )
                                ');
        $passadas = DB::select('SELECT
                                events.id as id, 
                                events.title as titulo, 
                                DATE_FORMAT(events.start , "%d/%m/%Y %H:%i:%s" ) as Data_Inicial,
                                DATE_FORMAT(events.end , "%d/%m/%Y %H:%i:%s" ) as Data_Final,
                                room.name sala,
                                events.condition as status,
                                events.priority as prioridade
                                FROM events
                                left join room ON room.id = events.room_id
                                WHERE events.start < CURDATE( )');  

        return view('home', [
            'results' => $results,
            'meeting' => $meeting,
            'passadas' => $passadas,
            ]);
    }
}
