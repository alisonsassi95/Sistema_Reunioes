<?php

namespace App\Http\Controllers;

use App\profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Alert;

class profileController extends Controller
{


    protected $profile;
    
    public function __construct(profile $profile)
    {   
        $this->profile = $profile;
        $this->middleware('auth');
    }

    public function index()
    {
        $profiles = $this->profile->paginate(20); // whereNotNull('rg')->
        return view('profile.index', ['profiles' => $profiles]);
    }

    public function add()
    {
        $profiles = profile::all();
        return view('profile.add', ['profiles' => $profiles]);
    }

    public function save(\App\Http\Requests\profileRequests $request)
    {
        $insert = profile::create($request->all());

        // Verifica se inseriu com sucesso
        if ($insert)
        return redirect()
                ->route('profile.index')
                ->with('success', 'Perfil cadastrada com sucesso!');
                    

        // Redireciona de volta com uma mensagem de erro
        return redirect()
                    ->back()
                    ->with('error', 'Falha ao inserir');
    }

    public function edit ($id)
    {
        $profile = profile::find($id);
        if(!$profile){
            \Session::flash('flash_message', [
                'msg'=>"Não existe esse Perfil cadastrado, deseja cadastrar novo Perfil?",
                'class'=>"alert-danger"
            ]);
            return redirect()->route('profile.add');
        }
        return view('profile.edit', compact('profile'));
    }

    public function update(Request $request, $id)
    {
        profile::find($id)->update($request->all());
        
        return redirect()
                ->route('profile.index')
                ->with('success', 'Perfil atualizada com sucesso!');      
        
    }

    public function delete($id)
    {
        $profile = profile::find($id);
        
        $profile->delete();

        return redirect()
                ->route('profile.index')
                ->with('info', 'Deletado com sucesso!');      
        
    }

}
