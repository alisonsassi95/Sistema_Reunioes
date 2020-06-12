<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth;
use App\Requests\MeetingRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
use Illuminate\Support\Facades\DB; // para usar o SQL
use App\Meeting;
use Alert;

class MeetingController extends Controller
{
    protected $meetingModel;
    //Construtores responsaveis pela inicialização da Classe
    public function __construct(Meeting $meetingModel)
    {   
        $this->meetingModel = $meetingModel;
        $this->middleware('auth');
    }
    // Função responsavel por trazer todos os meetingos cadastrados
    public function index()
    {
        $meetings = $this->meetingModel->paginate(20);
        return view('meeting.index', ['meetings' => $meetings]);
    }
    // Função responsavel por trazer a tela de cadastro de meetingos
    public function add()
    {

        return view('meeting.add');
    }
    // Função Responsavel por salvar um novo meetingo no banco
    public function save(\App\Http\Requests\MeetingRequest $request)
    {
        $insert = 0;

        dd('ola');
        try{
            $insert = Meeting::create($request->all());
        }catch(Exception $e){
            echo('Erro!');
        }finally{
            if ($insert){
            return redirect()
                ->route('meeting.index')
                ->with('success', 'Cadastrado com Sucesso!');
            }
        }
    }
    
    // Função Responsavel por trazer a tela de edição de meetingos
    public function edit ($id)
    {
        $meeting = Meeting::find($id);
        if(!$meeting){
            \Session::flash('flash_message', [
                'msg'=>"Não existe esse Reunião cadastrado, deseja cadastrar uma reunião?",
                'class'=>"alert-danger"
            ]);
            return redirect()->back();
        }
        return view('meeting.edit', ['meeting' => $meeting]);
        
    }
    // Função Responsavel por salvar a edição de um meetingo
    public function update(Request $request, $id)
    {
        
        Meeting::find($id)->update($request->all());

        return redirect()
                ->route('meeting.index')
                ->with('info', 'Atualizado com sucesso!');        
        
    }
    // Função Responsavel pela exclusão de um meetingo
    public function delete($id)
    {
        $meeting = Meeting::find($id);
        $meeting->delete();

        alert()->success('', 'Deletado com Sucesso')->persistent('OK');

        return redirect()->route('meeting.index');        
        
    }
}
