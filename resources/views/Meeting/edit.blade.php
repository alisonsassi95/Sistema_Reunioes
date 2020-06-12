@extends('adminlte::page')

@section('title', 'Editar Meeting')

@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
       <h3 class="box-title">Editar Meeting</h3>
    </div>
    <div role="form">
    <div class="box-body">

                    <form action="{{ route('meeting.update', $meeting->id) }}" method="post">
                    {{ csrf_field() }}
                        <input type="hidden" name="_method" value="put">
                        <div class="form-group">


                        <div class="form-group row">
                            <label for="title" class="col-sm-4 col-form-label">Titulo</label>
                            <div class="col-sm-8">
                                <input type="text" name="title" value="{{$meeting->title}}" class="form-control" id="title">
                                <input type="hidden" name="id">
                            </div>
                        </div>

                        <div class="form-group row">
                        <label for="room" class="col-sm-4 col-form-label">Sala</label>
                            <div class="col-sm-8">
                                <select class="form-control" class="col-sm-8" name="room" id="room">
                                    <option value="1">Sala 1</option>
                                    <option value="2">Sala 2</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="start" class="col-sm-4 col-form-label">Data/hora Inicial</label>
                            <div class="col-sm-8">
                                <input type="text" name="start" class="form-control date-time" id="start">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="end" class="col-sm-4 col-form-label">Data/hora Final</label>
                            <div class="col-sm-8">
                                <input type="text" name="end" class="form-control date-time" id="end">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="color" class="col-sm-4 col-form-label">Cor do Evento</label>
                            <div class="col-sm-8">
                                <input type="color" name="color" class="form-control" id="color">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="end" class="col-sm-4 col-form-label">Estado da reunião</label>
                            <div class="col-sm-8">
                                <input readOnly = "true" type="text" name="condition" value = "Reunião agendada" class="form-control" id="condition">
                            </div>

                        <div class="form-group row">
                            <label for="participants_id" class="col-sm-4 col-form-label">Participantes</label>
                            <div class="col-sm-8">
                                <select class="form-control" class="col-sm-8" name="participants_id" id="participants_id">
                                    <option value="1">Participante 1</option>
                                    <option value="2">Participante 2</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-sm-4 col-form-label">Descrição</label>
                            <div class="col-sm-8">
                                <textarea name="description" id="description" cols="40" rows="4"></textarea>
                            </div>
                        </div>
                                <div class="form-group {{$errors->has('name') ? 'has-error' : '' }}">
                                        <label for="name">Nome</label>
                                        <input type="text" value="{{$meeting->name}}" name="name" class="form-control" placeholder="Nome do Meeting">
                                    @if($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('name')}}</strong>
                                    </span>
                                    @endif
                                    </div>
            

                                    <div class="form-group">
                                            <label>Status</label>
                                             <select class="form-control"  value="{{$meeting->ativo}}" name="active" id="active">
                                                 <option value="1">Ativo</option>
                                                 <option value="0">Inativo</option>
                                             </select>
                                    </div>

                                    <div class="form-group {{$errors->has('description') ? 'has-error' : '' }}">
                                    <label for="description">Descrição</label>
                                        <textarea for="description" value="{{$meeting->description}}" type="text" id="description" class="form-control rounded-0 {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description') }}" required autofocus>Descrição</textarea>
            
                                            @if ($errors->has('description'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('description') }}</strong>
                                                </span>
                                            @endif
                                    </div>
                        <button class="btn btn-primary"><i class="glyphicon glyphicon-check"></i >Salvar</button>
                    </form>

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif 

        </div>
    </div>
</div>
@stop