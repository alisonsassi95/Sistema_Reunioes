@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Perfil</h1>
@stop

@section('content')
<div class="panel-body">
        <img src="/imagens/avatar/{{Auth::user()->avatar}}" style="width:150px;height:150px;float:left;border-radius:50%;margin-right:25px;">
        <h2>{{$User->name}}</h2>
        <form enctype="multipart/form-data" action="{{route('User.perfilAtualiza')}}" method="POST">
        <label>Atualizar imagem do perfil</label>
            <input type="file" name="avatar">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="submit" class="pull-right btn btn-sm btn-primary"> 	
        </form>
    </div>
    <form action="{{ route('User.updateProfile', $User->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
            <!-- Profile Image -->
            
        <div class="box box-primary">
            <div class="box-body box-profile">

                    {{-- <div class="panel-body">
                            <img src="/imagens/avatar/{{Auth::user()->avatar}}" style="width:150px;height:150px;float:left;border-radius:50%;margin-right:25px;">
                             <h2>{{$user->name}}</h2>
                    </div> --}}

            {{-- <img class="profile-User-img img-responsive img-circle" src="/imagens/avatar/{{Auth::user()->avatar}}" alt="User profile picture">           
            <h3 class="profile-Username text-center">{{$user->name}}</h3> --}}
                      <!-- TABLE: LATEST ORDERS -->
                    <div class="box box-info">
                        <div class="box-header with-border">
                        <h3 class="box-title">Aqui você pode editar seus dados!</h3>
                        </div>
                        <div class="box-body">
                        <div class="table-responsive">
                        @include('sweet::alert')
                            <table class="table no-margin">
                                    <tbody>

                                 <div class="form-group {{$errors->has('name') ? 'has-error' : '' }}">
                                    <label for="name">Nome</label>
                                    <input type="text" name="name" value= "{{ $User->name }}" class="form-control" placeholder="Nome completo do usuário">
                                @if($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{$errors->first('name')}}</strong>
                                </span>
                                @endif
                                </div>

                                <div class=" form-group" >
                                    <label for="genre">Genero</label>
                                    <select class="form-control" value="{{$User->genre}}" name = "genre">
                                        @if($User->genre == 'M')
                                        <option value= "{{ $User->genre }}" >Masculino</option>
                                        <option value="F">Femenino</option>
                                        @endif
                                        @if($User->genre == 'F')
                                        <option value= "{{ $User->genre }}" >Feminino</option>
                                        <option value="M">Masculino</option>
                                        @endif
                                    </select>
                                </div>

                                <div class="form-group {{$errors->has('birthdate') ? 'has-error' : '' }}">
                                    <label for="birthdate">Data de nascimento</label>
                                    <input type="date" name="birthdate" value="{{$User->birthdate}}" class="form-control" placeholder="Data de nascimento">
                                @if($errors->has('birthdate'))
                                <span class="help-block">
                                    <strong>{{$errors->first('birthdate')}}</strong>
                                </span>
                                @endif
                                </div>

                                <div class="form-group {{$errors->has('telephone') ? 'has-error' : '' }}">
                                <label for="telephone">Telefone</label>
                                    <input type="text" name="telephone" id = "telephone" value="{{$User->telephone}}" class="form-control" placeholder="Telefone do cliente">
                                @if($errors->has('telephone'))
                                <span class="help-block">
                                    <strong>{{$errors->first('telephone')}}</strong>
                                </span>
                                @endif
                                </div>
                                
                                <div class="form-group {{$errors->has('sector') ? 'has-error' : '' }}" value="{{ old('sector') }}">
                                    <label for="sector">Setor</label>
                                    <input type="text" name="sector" class="form-control" value="{{$User->sector}}" placeholder="Digite o setor">
                                @if($errors->has('sector'))
                                <span class="help-block">
                                    <strong>{{$errors->first('sector')}}</strong>
                                </span>
                                @endif
                                </div>

                                <div class="form-group {{$errors->has('email') ? 'has-error' : '' }}">
                                    <label for="email">E-mail</label>
                                    <input type="email" name="email" class="form-control"  value="{{$User->email}}" placeholder="E-mail do cliente">
                                    @if($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{$errors->first('email')}}</strong>
                                </span>
                                @endif
                                </div>

                                <div class="form-group {{$errors->has('User') ? 'has-error' : '' }}" value="{{ old('User') }}">
                                    <label for="name">Usuário</label>
                                    <input type="text" name="User" class="form-control" value="{{$User->User}}" placeholder="Usuário para logar no sistema.">
                                @if($errors->has('User'))
                                <span class="help-block">
                                    <strong>{{$errors->first('User')}}</strong>
                                </span>
                                @endif
                                </div>

                                <div class="form-group {{$errors->has('name') ? 'has-error' : '' }}" value="{{ old('password') }}">
                                    <label for="password" >Senha</label>
                                    <input type="password" name="password" value="{{$User->password}}" class="form-control" placeholder="Digite a senha">
                                    <p class="info-label">Senha entre 8 a 14 caracteres, contendo letras e números</p>
                                    @if($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{$errors->first('password')}}</strong>
                                        </span>
                                    @endif
                                </div>


                                <div class=" form-group" >
                                    <label for="active">Status</label>
                                    <select class="form-control" value="{{$User->active}}" name = "active">
                                        @if($User->active == '0')
                                        <option value= "{{ $User->active }}" >Inativo</option>
                                        <option value="1">Ativo</option>
                                        @endif
                                        @if($User->active == '1')
                                        <option value= "{{ $User->active }}" >Ativo</option>
                                        <option value="0">Inativo</option>
                                        @endif
                                    </select>
                                </div>

                                <div class="form-group {{$errors->has('profile') ? 'has-error' : '' }}" value= "{{ old('profile')}}" >
                                    <label for="profile">Perfil</label>
                                        <select class="form-control"  name="profile" id="profile">
                                            <option value= "{{ $User->profile }}" >{{ $User->profile }}</option>
                                        </select>   
                                </div>


                                <div class="form-group {{$errors->has('description') ? 'has-error' : '' }}">
                                <label for="description">Descrição</label>
                                    <textarea for="description" type="text" id="description" value= "{{ $User->description }}"  class="form-control rounded-0 {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description') }}" required autofocus>Descrição</textarea>

                                        @if ($errors->has('description'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                        @endif
                                </div>

                                     </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-primary btn-block"> <b><i class="glyphicon glyphicon-save"></i > Salvar</b> </button>
                    <button href="{{ URL::previous() }}" class="btn btn-primary btn-block"><b>Sair</b></button>
            </div>
        </div>
    </form>
@stop