@extends('adminlte::page')

@section('title', 'Editar o Usuário')

@section('content')

<div class="box box-primary">

    <div class="row">
            <div class="panel panel-default">
            @include('sweet::alert')
            <ol class="breadcrumb panel-heading" >
            <li class="active" style="font-size:110%">Edição do Usuário</li>
            </ol>

                    <form action="{{ route('User.update', $user->id) }}" method="post">
                    {{ csrf_field() }}

                    <input type="hidden" name="_method" value="put">


                    <div class="form-group {{$errors->has('name') ? 'has-error' : '' }}">
                            <label for="name">Nome</label>
                            <input type="text" name="name" value= "{{ $user->name }}" class="form-control" placeholder="Nome completo do usuário">
                        @if($errors->has('name'))
                        <span class="help-block">
                            <strong>{{$errors->first('name')}}</strong>
                        </span>
                        @endif
                        </div>

                        <div class=" form-group" >
                            <label for="genre">Genero</label>
                            <select class="form-control" value="{{$user->genre}}" name = "genre">
                                @if($user->genre == 'M')
                                <option value= "{{ $user->genre }}" >Masculino</option>
                                <option value="F">Femenino</option>
                                @endif
                                @if($user->genre == 'F')
                                <option value= "{{ $user->genre }}" >Feminino</option>
                                <option value="M">Masculino</option>
                                @endif
                            </select>
                        </div>

                        <div class="form-group {{$errors->has('birthdate') ? 'has-error' : '' }}">
                            <label for="birthdate">Data de nascimento</label>
                            <input type="date" name="birthdate" value="{{$user->birthdate}}" class="form-control" placeholder="Data de nascimento">
                        @if($errors->has('birthdate'))
                        <span class="help-block">
                            <strong>{{$errors->first('birthdate')}}</strong>
                        </span>
                        @endif
                        </div>

                        <div class="form-group {{$errors->has('telephone') ? 'has-error' : '' }}">
                        <label for="telephone">Telefone</label>
                            <input type="text" name="telephone" id = "telephone" value="{{$user->telephone}}" class="form-control" placeholder="Telefone do cliente">
                        @if($errors->has('telephone'))
                        <span class="help-block">
                            <strong>{{$errors->first('telephone')}}</strong>
                        </span>
                        @endif
                        </div>
                        
                        <div class="form-group {{$errors->has('sector') ? 'has-error' : '' }}" value="{{ old('sector') }}">
                            <label for="sector">Setor</label>
                            <input type="text" name="sector" class="form-control" value="{{$user->sector}}" placeholder="Digite o setor">
                        @if($errors->has('sector'))
                        <span class="help-block">
                            <strong>{{$errors->first('sector')}}</strong>
                        </span>
                        @endif
                        </div>

                        <div class="form-group {{$errors->has('email') ? 'has-error' : '' }}">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" class="form-control"  value="{{$user->email}}" placeholder="E-mail do cliente">
                            @if($errors->has('email'))
                        <span class="help-block">
                            <strong>{{$errors->first('email')}}</strong>
                        </span>
                        @endif
                        </div>

                        <div class="form-group {{$errors->has('user') ? 'has-error' : '' }}" value="{{ old('user') }}">
                            <label for="name">Usuário</label>
                            <input type="text" name="user" class="form-control" value="{{$user->user}}" placeholder="Usuário para logar no sistema.">
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


                        <div class=" form-group" >
                            <label for="active">Status</label>
                            <select class="form-control" value="{{$user->active}}" name = "active">
                                @if($user->active == '0')
                                <option value= "{{ $user->active }}" >Inativo</option>
                                <option value="1">Ativo</option>
                                @endif
                                @if($user->active == '1')
                                <option value= "{{ $user->active }}" >Ativo</option>
                                <option value="0">Inativo</option>
                                @endif
                            </select>
                        </div>

                        <div class="form-group {{$errors->has('profile') ? 'has-error' : '' }}" value= "{{ old('profile')}}" >
                            <label for="profile">Perfil</label>
                                <select class="form-control"  name="profile" id="profile">
                                    <option value= "{{ $user->profile }}" >{{ $user->profile }}</option>
                                </select>   
                        </div>


                        <div class="form-group {{$errors->has('description') ? 'has-error' : '' }}">
                        <label for="description">Descrição</label>
                            <textarea for="description" type="text" id="description" value= "{{ $user->description }}"  class="form-control rounded-0 {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description') }}" required autofocus>Descrição</textarea>

                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                        </div>


                        <button class=" form-group btn btn-info" > <i class="glyphicon glyphicon-save"></i >Salvar</button>
                    </form>
                    @if (Session::has('message'))
                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                    @endif
                </div>
            </div>
        </div>

</div>
                
@stop