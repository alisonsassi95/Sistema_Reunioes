<?php

namespace App\Http\Controllers;

use App\examtype;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Requests\examtypeRequests;
use Alert;
class examtypeController extends Controller
{


    protected $examtype;

    public function __construct(examtype $examtype)
    {   
        $this->examtype = $examtype;
        $this->middleware('auth');
        
    }
    //Função responsável por gravar o tipo de exame
    public function save(examtypeRequests $request)
    {
        $insert = 0;
        try{
            $insert=Examtype::create($request->all());
        }catch(Exception $e){
            echo('Erro!');
        }finally{
            if ($insert){
        return redirect()
            ->route('equipament.add')
            ->with('success', 'Cadastrado com Sucesso!');
            }
        }
        // try{
        //     $insert = examtype::create($request->all());
        //     // Verifica se inseriu com sucesso
        //     if ($insert)
        //     return redirect()
        //                 ->back();
                        

        //     // Redireciona de volta com uma mensagem de erro
        //     return redirect()
        //                 ->back()
        //                 ->with('error', 'Falha ao inserir');
        
        // }catch(Exeption $e){
        //     return 'Erro';
        // }
    }

}
