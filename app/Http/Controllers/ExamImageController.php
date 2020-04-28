<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\exam_image;
use App\Exam;
use Image;
use Alert;


class ExamImageController extends Controller
{
    protected $ExamImage;
    public function __construct(exam_image $ExamImage)
    {   
        $this->ExamImage = $ExamImage;
        $this->middleware('auth');
    }

    public function images($id)
    {
        try{
            $exm = Exam::find($id);
            return view('Exam.images', ['exm' => $exm] );

        }catch(Exeption $e){
            dd('Erro!');
            \Session::flash('flash_message', [
                'msg'=>"Não existe esse exame cadastrado, deseja cadastrar?",
                'class'=>"alert-danger"
            ]);
            return view('Exam.add');
        }
    }

    public function UparImagens(Request $request){

        if($request->hasFile('imagem')){
            $Image=$request->file('imagem');

            $nome_arquivo=time() . '.' . $Image->getClientOriginalExtension();
            Image::make($Image)->resize(300, 300)->save( public_path('/imagens/Exames/' . $nome_arquivo));
           

            $IMG= new exam_image();
            $IMG->exam_id= $request->exam_id; // tem que pegar o valor do exame
            $IMG->imagem=$nome_arquivo;
            $IMG->Data=date('Y-m-d H:i');
            $IMG->save();

            Alert::success('Adicionado com Sucesso!');
            return redirect()
                    ->back();
        }else{
            Alert::error('Nenhuma imagem foi selecionada');
            return redirect()
                    ->back();
        }
    }


/*    MULTIPLAS IMAGENS 

$diretorio = "imagens/";

if(!is_dir($diretorio)){ 
	echo "Pasta $diretorio nao existe";
}else{
	$arquivo = isset($_FILES['arquivo']) ? $_FILES['arquivo'] : FALSE;
	for ($controle = 0; $controle < count($arquivo['name']); $controle++){
		
		$destino = $diretorio."/".$arquivo['name'][$controle];
		if(move_uploaded_file($arquivo['tmp_name'][$controle], $destino)){
			echo "Upload realizado com sucesso<br>"; 
		}else{
			echo "Erro ao realizar upload";
		}
		
	}
}
*/


        public function store(ManifestationFormRequest $request)
        {
            //Noma do arquivo a ser armazenado
            $name = date('dmYHis');
        
            //armazena form em dataForm
            $dataForm = $request->except('_token');
            //Armazena Input File em $file
            $file = $request->file('upload');
        
            //Se input file nulo
            if ($file = null)
            {
               return 'Não foi selecionado a imagem';
            }else
            {
                //Insere Formulário no Banco
               // $insert = $this->manifestation->insert($dataForm);
                //Pega extensão do arquivo original
                $extension = $request->file('upload')->extension();
                //Armazena arquivo em Storage/app/uploads e renomeia.
                $upload = $request->upload->storeAs('uploads', 
        $name.'.'.$extension);
            }
        
            Alert::success('Enviado...', 'Obrigado pela sua contribuição');
            return redirect()->route('index');
        }

}
