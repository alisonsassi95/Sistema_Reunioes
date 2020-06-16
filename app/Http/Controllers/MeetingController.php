<?php

namespace App\Http\Controllers;

use App\meeting;
use App\Event;
use App\User;
use App\Room;
use App\Participants;
use Illuminate\Http\Request;
use App\Requests\meetingRequest;
use Alert;
use Illuminate\Support\Facades\DB; // para usar o SQL

class meetingController extends Controller
{
    protected $meetingModel;
    //Construtores responsaveis pela inicialização da Classe
    public function __construct(meeting $meetingModel)
    {   
        $this->meetingModel = $meetingModel;
        $this->middleware('auth');
    }
    public function __construct_user(User $User)
    {   
        $this->User = $User;
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
        $parts = User::all();
        $rooms = Room::all()->where('active', '1');
        return view('meeting.add', ['parts' => $parts], ['rooms' => $rooms]);
    }
    // Função Responsavel por salvar um novo meetingo no banco
    public function save(Request $request)
    {
        $data_inicial = $request->get('start');
        $data_final = $request->get('end');
        
        $Verificacao = DB::select("
                        SELECT 
                        events.id
                        FROM events 
                        LEFT JOIN participants ON events.id = participants.event_id 
                        WHERE events.start BETWEEN '".$data_inicial."' AND '".$data_final."'
                        AND events.end BETWEEN '".$data_inicial."' AND '".$data_final."'
                        AND participants.user_id IN (1) ");

            if(!empty($Verificacao)){
                return redirect()
                                ->back()
                                ->with('info', 'Já existe uma reunião nesse horário!');      
            }
           /* existe outra reuniao nesse mesmo horário?

        participantes da nova reuniao é igual os participantes da reuniao com o mesmo horario?*/
        try{
            //salvar o evento
            $event= new Event();
            $event->title=$request->get('title');
            $event->room_id=$request->get('room_id');
            $event->priority=$request->get('priority');
            $event->start=$request->get('start');
            $event->end=$request->get('end');
            $event->color=$request->get('color');
            $event->condition=$request->get('condition');
            $event->description=$request->get('description');
            $event->requester_id=$request->get('requester_id');
            $event->save();
        

        //salvar os participantes
        $items = $request->input('participants');
        if(is_null($items)){
             $items = $request->input('requester_id'); 
        }
        for ($i = 0; $i <= count($items)-1; $i++) {
            $participants = new Participants();
            $participants->event_id= $event->id;
            $participants->user_id= (int)$items[$i];
            $participants->save();
        }
      
        return redirect('/home')->with('sucess', 'Sucesso!');

        //Se caso der algum erro, dará essa mmensagem
        }catch(Exception $e) {
            return alert()->success('', 'Falha ao inserir.')->persistent('OK');

        }  
      
    }
    // Função Responsavel por trazer a tela de edição de meetingos
    public function edit ($id)
    {
        $meeting = meeting::find($id);
        if(!$meeting){
            \Session::flash('flash_message', [
                'msg'=>"Não existe esse item cadastrado, deseja cadastrar um novo?",
                'class'=>"alert-danger"
            ]);
            return redirect()->back();
        }
        return view('meeting.edit', ['meeting' => $meeting]);
        
    }
    // Função Responsavel por salvar a edição de um meetingo
    public function update(Request $request, $id)
    {
        
        meeting::find($id)->update($request->all());

        return redirect()
                ->route('meeting.index')
                ->with('info', 'Atualizado com sucesso!');        
        
    }
    // Função Responsavel pela exclusão de um meetingo
    public function delete($id)
    {
        $meeting = meeting::find($id);
        $meeting->delete();

        alert()->success('', 'Deletado com Sucesso')->persistent('OK');

        return redirect()->route('meeting.index');        
        
    }
}
