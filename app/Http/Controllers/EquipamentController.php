<?php

namespace App\Http\Controllers;

use App\Equipament;
use Illuminate\Http\Request;
use App\Requests\EquipamentRequest;
use Alert;
class EquipamentController extends Controller
{
    protected $equipamentModel;
    //Construtores responsaveis pela inicialização da Classe
    public function __construct(Equipament $equipamentModel)
    {   
        $this->equipamentModel = $equipamentModel;
        $this->middleware('auth');
    }
    // Função responsavel por trazer todos os equipamentos cadastrados
    public function index()
    {
        $equipaments = $this->equipamentModel->paginate(20); // whereNotNull('rg')->
        return view('equipament.index', ['equipaments' => $equipaments]);
    }
    // Função responsavel por trazer a tela de cadastro de equipamentos
    public function add()
    {
        return view('equipament.add');
    }
    // Função Responsavel por salvar um novo equipamento no banco
    public function save(\App\Requests\EquipamentRequest $request)
    {
        $insert = 0;
        try{
            $insert = Equipament::create($request->all());
        }catch(Exception $e){
            echo('Erro!');
        }finally{
            if ($insert){
            return redirect()
                ->route('equipament.index')
                ->with('success', 'Cadastrado com Sucesso!');
            }
        }
    }
    // Função específica para 
    public function saveModal(\App\Requests\EquipamentRequest $request)
    {
        $insert = 0;
        try{
            $insert = Equipament::create($request->all());
        }catch(Exception $e){
            echo('Erro!');
        }finally{
            if ($insert){
            return redirect()
                ->back()
                ->with('success', 'Cadastrado com Sucesso!');
            }
        }
    }

    // Função Responsavel por trazer a tela de edição de equipamentos
    public function edit ($id)
    {
        $equipament = Equipament::find($id);
        if(!$equipament){
            \Session::flash('flash_message', [
                'msg'=>"Não existe esse equipamento cadastrado, deseja cadastrar um novo equipamento?",
                'class'=>"alert-danger"
            ]);
            return redirect()->back();
        }
        return view('equipament.edit', ['equipament' => $equipament]);
        
    }
    // Função Responsavel por salvar a edição de um equipamento
    public function update(Request $request, $id)
    {
        
        Equipament::find($id)->update($request->all());

        return redirect()
                ->route('equipament.index')
                ->with('info', 'Atualizado com sucesso!');        
        
    }
    // Função Responsavel pela exclusão de um equipamento
    public function delete($id)
    {
        $equipament = Equipament::find($id);
        $equipament->delete();

        alert()->success('', 'Deletado com Sucesso')->persistent('OK');

        return redirect()->route('equipament.index');        
        
    }
}
