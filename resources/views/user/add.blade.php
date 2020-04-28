@extends('adminlte::page')

@section('title', 'Cadastro de Usuários')

@section('content')

<div class="box box-primary">
 <div class="box-header with-border">
    <h3 class="box-title">Cadastro de Usuários</h3>
 </div>
    <div role="form">
        <div class="box-body">
            @include('sweet::alert')
                    <form action="{{ route('User.save') }}" method="post">
                    {{ csrf_field() }}
                    <div class="panel-body">
                            <img src="/imagens/avatar/{{Auth::user()->avatar}}" style="width:150px;height:150px;float:left;border-radius:50%;margin-right:25px;">
                            <h2>Nome do Usuário</h2>
                            <form enctype="multipart/form-data" action="{{route('User.perfilAtualiza')}}" method="POST">
                    </div>
                    <div class="form-group {{$errors->has('name') ? 'has-error' : '' }}">
                            <label for="name">Nome</label>
                            <input type="text" name="name" class="form-control" placeholder="Nome completo do usuário">
                        @if($errors->has('name'))
                        <span class="help-block">
                            <strong>{{$errors->first('name')}}</strong>
                        </span>
                        @endif
                        </div>

                        <div class="form-group">
                        <label for="genre">Genero</label>
                            <select class="form-control" name = "genre">
                                <option value="">Selecione</option>
                                <option value="M">Masculino</option>
                                <option value="F">Feminino</option>
                            </select>
                        @if($errors->has('genre'))
                        <span class="help-block">
                            <strong>{{$errors->first('genre')}}</strong>
                        </span>
                        @endif
                        </div>

                        <div class="form-group {{$errors->has('birthdate') ? 'has-error' : '' }}">
                            <label for="birthdate">Data de nascimento</label>
                            <input type="date" name="birthdate" class="form-control" placeholder="Data de nascimento">
                        @if($errors->has('birthdate'))
                        <span class="help-block">
                            <strong>{{$errors->first('birthdate')}}</strong>
                        </span>
                        @endif
                        </div>

                        <div class="form-group {{$errors->has('telephone') ? 'has-error' : '' }}">
                        <label for="telephone">Telefone</label>
                            <input type="text" name="telephone" id = "telephone" class="form-control" placeholder="Telefone do cliente">
                        @if($errors->has('telephone'))
                        <span class="help-block">
                            <strong>{{$errors->first('telephone')}}</strong>
                        </span>
                        @endif
                        </div>
                        
                        <div class="form-group {{$errors->has('sector') ? 'has-error' : '' }}" value="{{ old('sector') }}">
                            <label for="sector">Setor</label>
                            <input type="text" name="sector" class="form-control" placeholder="Digite o setor">
                        @if($errors->has('sector'))
                        <span class="help-block">
                            <strong>{{$errors->first('sector')}}</strong>
                        </span>
                        @endif
                        </div>

                        <div class="form-group {{$errors->has('email') ? 'has-error' : '' }}">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" class="form-control" placeholder="E-mail do cliente">
                            @if($errors->has('email'))
                        <span class="help-block">
                            <strong>{{$errors->first('email')}}</strong>
                        </span>
                        @endif
                        </div>

                        <div class="form-group {{$errors->has('user') ? 'has-error' : '' }}" value="{{ old('user') }}">
                            <label for="name">Usuário</label>
                            <input type="text" name="user" class="form-control" placeholder="Usuário para logar no sistema.">
                        @if($errors->has('user'))
                        <span class="help-block">
                            <strong>{{$errors->first('user')}}</strong>
                        </span>
                        @endif
                        </div>

                        <div class="form-group {{$errors->has('name') ? 'has-error' : '' }}" value="{{ old('password') }}">
                            <label for="password" >Senha</label>
                            <input type="password" name="password" class="form-control" placeholder="Digite a senha">
                            <p class="info-label">Senha entre 8 a 14 caracteres, contendo letras e números</p>
                            @if($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{$errors->first('password')}}</strong>
                                </span>
                            @endif
                        </div>


                        <div class="form-group">
                           <label>Status</label>
                            <select class="form-control" name="active" id="active">
                                <option value="1">Ativo</option>
                                <option value="0">Inativo</option>
                            </select>
                        </div>

                        <div class="form-group {{$errors->has('profile') ? 'has-error' : '' }}" value= "{{ old('profile')}}" >
                            <label for="profile">Perfil</label>
                                <select class="form-control"  name="profile" id="profile">
                                    <option value="">Selecione um Perfil</option>       
                                        @foreach($results as $profile)
                                    <option value="{{ $profile->id }}">{{ $profile->name }}</option>
                                @endforeach
                                </select>   
                        </div>


                        <div class="form-group {{$errors->has('description') ? 'has-error' : '' }}">
                        <label for="description">Descrição</label>
                            <textarea for="description" type="text" id="description" class="form-control rounded-0 {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description') }}" required autofocus>Descrição</textarea>

                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="col-md-12"> 
                        <button class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Adicionar</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>

@stop
