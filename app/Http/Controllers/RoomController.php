<?php

namespace App\Http\Controllers;

use App\Room;
use App\Equipament;
use Illuminate\Http\Request;
use App\Requests\RoomRequest;
use App\Requests\EquipamentRequest;
use Alert;
class RoomController extends Controller
{
    protected $roomModel;
    //Construtores responsaveis pela inicialização da Classe
    public function __construct(Room $roomModel)
    {   
        $this->roomModel = $roomModel;
        $this->middleware('auth');
    }
    public function __constructE(Equipament $equipament)
    {   
        $this->equipament = $equipament;
        $this->middleware('auth');
    }

    // Função responsavel por trazer todos os roomos cadastrados
    public function index()
    {
        $ResEquipament = Equipament::all();
        $rooms = $this->roomModel->paginate(20); // whereNotNull('rg')->
        return view('room.index', ['rooms' => $rooms, 'ResEquipament' => $ResEquipament]);
    }
    
    // Função responsavel por trazer a tela de cadastro de roomos
    public function add()
    {
        $results = Equipament::all();
        return view('room.add', ['results' => $results]);
    }
    // Função Responsavel por salvar um novo roomo no banco
    public function save(\App\Requests\RoomRequest $request)
    {
        $insert = 0;
        try{
            $insert = Room::create($request->all());
        }catch(Exception $e){
            echo('Erro!');
        }finally{
            if ($insert){
            return redirect()
                ->route('room.index')
                ->with('success', 'Cadastrado com Sucesso!');
            }
        }
    }
    // Função Responsavel por trazer a tela de edição de roomos
    public function edit ($id)
    {
        $room = Room::find($id);
        $results = Equipament::all();
        if(!$room){
            \Session::flash('flash_message', [
                'msg'=>"Não existe esse roomo cadastrado, deseja cadastrar um novo roomo?",
                'class'=>"alert-danger"
            ]);
            return redirect()->back();
        }
        return view('room.edit', ['room' => $room,'results' => $results]);
        
    }
    // Função Responsavel por salvar a edição de um roomo
    public function update(Request $request, $id)
    {
        
        Room::find($id)->update($request->all());

        return redirect()
                ->route('room.index')
                ->with('info', 'Atualizado com sucesso!');        
        
    }
    // Função Responsavel pela exclusão de um roomo
    public function delete($id)
    {
        $room = Room::find($id);
       
        $room->delete();

        alert()->success('', 'Deletado com Sucesso')->persistent('OK');

        return redirect()->route('room.index');        
        
    }
}
