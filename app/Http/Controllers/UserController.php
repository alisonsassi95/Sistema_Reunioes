<?php

namespace App\Http\Controllers;

use App\User;
use App\Profile;
use Illuminate\Http\Request;
use App\Requests\UserRequest;
use Alert;
use Session;
use DB;
use Auth;
use Image;

class UserController extends Controller
{
    
    protected $user;
    public function __construct(User $user)
    {   
        $this->user = $user;
        $this->middleware('auth');
        
    }
    protected $profiles;
    public function __constructS(Profile $profiles)
    {   
        $this->profiles = $profiles;
        $this->middleware('auth');
    }

    public function index()
    {
        $results = $this->user->paginate(20); 
        return view('User.index',['results' => $results]);
    }

    public function perfilAtualiza(Request $request){

        
        if($request->hasFile('avatar')){
            $avatar=$request->file('avatar');
            
            $nome_arquivo=time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('/imagens/avatar/' . $nome_arquivo));
           
            $user=Auth::user();
            $user->avatar = $nome_arquivo;
            $user->save();

        }

        $user = auth()->user();
         return view('profile', ['User'=>Auth::user()]);

    }

    public function profileUpdate(Request $request)
    {
        $user = auth()->user();

        $data = $request->all();

        if ($data['password'] != null)
            $data['password'] = bcrypt($data['password']);
        else
            unset($data['password']);

        $update = $user->update($data);
        
        if ($update)
        
            return redirect()
                        ->route('profile')
                        ->with('success', 'Sucesso ao atualizar!');

        return redirect()
                    ->back()
                    ->with('error', 'Falha ao atualizar o perfil...');
    }
    //Responsavel por trazer a tela de cadastro de Usuários
    public function add()
    {
        $results = Profile::all();

        return view('User.add', ['results' => $results]);
    }

    //Responsavel pelo cadastro de um novo usuário
    public function save(UserRequest $request)
    {

        if($request['password']!=null){
            $request['password'] = bcrypt( $request['password']);
            }else{    
            unset( $request['password']);
            }
        $tipopessoa = $request->get('profile');
        
            $insert = 0;
           try{
                $insert = user::create($request->all()); 
                
           }catch(Exception $e){
                return redirect()
                        ->back()
                        ->with('info', 'Dados cadastrais Incompletos!');
        }finally{ 
                   // Verifica se inseriu com sucesso
        return redirect()
                ->route('User.index')
                ->with('success', 'Cadastrado com Sucesso!');
            }
        }
    //Responsavel por trazer a tela de Edição de Usuario
    public function edit ($id)
    {
        $user = user::find($id);
        if(!$user){
            return redirect()->route('user.add');
        }
        return view('user.edit', compact('user'));
    }

    public function load($id)
    {
        $user = user::find($id);
        
        return view('User.add', ['user' => $user]);
    }


    public function profile()
    {
        $User = auth()->user();
        
        //$User = user::all()->find($user->id);
        
        //return view('profile', ['results' => $user, 'User' => $User]);
        return view('profile', ['User' => $User]);
    }

    
    public function update(Request $request, $id)
    {
        if($request['password']!=null){
            $request['password'] = bcrypt( $request['password']);
            }else{    
            unset( $request['password']);
            return redirect()
            ->route('User.index')
            ->with('info', 'Atualizado com sucesso!');    
            }
        user::find($id)->update($request->all());

        return redirect()
            ->route('User.index')
            ->with('info', 'Atualizado com sucesso!');    
        
    }

    public function updateProfile(Request $request, $id)
    {
        user::find($id)->update($request->all());
        
        return redirect()->route('profile')->with('success','Perfil Atualizado com Sucesso');        
        
    }

    public function editProfile($id)
    {
        $user = auth()->user();
            
        
        return view('profile', ['results' => $user]);
    }

    public function delete($id)
    {
        $users = user::find($id);
        
        $users->delete();
         \Session::flash('flash_message',[
            'msg'=>"usuário atualizada com sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect()->route('User.index')->with('success', 'cadastrada com sucesso!');      
        
    }
}
