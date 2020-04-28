@extends('adminlte::page')

@section('title', 'Editar Sala')

@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
       <h3 class="box-title">Editar Sala</h3>
    </div>
    <div role="form">
    <div class="box-body">

                    <form action="{{ route('room.update', $room->id) }}" method="post">
                    {{ csrf_field() }}
                        <input type="hidden" name="_method" value="put">
                        <div class="form-group">

                                <div class="form-group {{$errors->has('name') ? 'has-error' : '' }}">
                                        <label for="name">Nome</label>
                                        <input type="text" value="{{$room->name}}" name="name" class="form-control" placeholder="Nome do roomo">
                                    @if($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('name')}}</strong>
                                    </span>
                                    @endif
                                    </div>
            
                                    <div class="form-group">
                                        <label for="location">Localização</label>
                                        <input type="text" value="{{$room->location}}" name="location" class="form-control" placeholder="Localização da Sala">
                                    @if($errors->has('location'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('location')}}</strong>
                                    </span>
                                    @endif
                                    </div>

                                      

                                    <div class="form-group {{$errors->has('number') ? 'has-error' : '' }}">
                                        <label for="number">Número da Sala</label>
                                        <input type="text" value="{{$room->number}}" name="number" class="form-control" placeholder="Descreva o numero da sala">
                                    @if($errors->has('number'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('number')}}</strong>
                                    </span>
                                    @endif
                                    </div>
            


                                    <div class="form-group">
                                        <label for="capacity">Capacidade da sala</label>
                                        <input type="text" value="{{$room->capacity}}" name="capacity" class="form-control" placeholder="Descreva a capacidade da sala">
                                            @if($errors->has('capacity'))
                                            <span class="help-block">
                                        <strong>{{$errors->first('capacity')}}</strong>
                                    </span>
                                    @endif
                                    </div> 

                                    <div class="form-group">
                                            <label>Status</label>
                                             <select class="form-control"  value="{{$room->ativo}}" name="active" id="active">
                                                 <option value="1">Ativo</option>
                                                 <option value="0">Inativo</option>
                                             </select>
                                    </div>

      
                                        <label for="status">Tipo de Equipamento</label>
                                        <select class="form-control"  name="equipament_id" id="equipament_id">
                                            @foreach($results as $equipament)
                                             @if($room->equipament_id == $equipament->id )
                                                <option value= "{{ $equipament->id }}" >{{$equipament->name}}</option>
                                            @endif
                                            <option value="{{$equipament->id}}">{{$equipament->name}}</option>
                                            @endforeach
                                        </select>
                                        <br>
                                       
                                    <div class="form-group {{$errors->has('description') ? 'has-error' : '' }}">
                                    <label for="description">Descrição</label>
                                        <textarea for="description" value="{{$room->description}}" type="text" id="description" class="form-control rounded-0 {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description') }}" required autofocus>Descrição</textarea>
            
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