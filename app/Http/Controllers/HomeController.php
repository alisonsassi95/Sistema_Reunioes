<?php

namespace App\Http\Controllers;


use App\User;
use App\Event;
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
     
        $results = DB::select('SELECT
                                events.id as id, 
                                events.title as titulo, 
                                events.start as Data_Inicial,
                                events.end as Data_Final,
                                room.name sala,
                                events.condition as status,
                                events.priority as prioridade
                                FROM events
                                left join room ON room.id = events.room_id');  

        return view('home', [
            'results' => $results,
            ]);
    }
}
