@extends('adminlte::page')

@section('title', 'Cadastro de Salas')

@section('content')

<div class="box box-primary">
 <div class="box-header with-border">
    <h3 class="box-title">Cadastro de Salas</h3>
 </div>
 <div role="form">
        <div class="box-body">
            @include('sweet::alert')

                    <form action="{{ route('room.save') }}" method="post">
                    {{ csrf_field() }}
                        
                        <div class="form-group {{$errors->has('name') ? 'has-error' : '' }}">
                            <label for="name">Nome</label>
                            <input type="text" name="name" class="form-control" placeholder="Nome do Sala">
                        @if($errors->has('name'))
                        <span class="help-block">
                            <strong>{{$errors->first('name')}}</strong>
                        </span>
                        @endif
                        </div>

                        <div class="form-group">
                            <label for="location">Localização</label>
                            <input type="text" name="location" class="form-control" placeholder="Localização da Sala">
                        @if($errors->has('location'))
                        <span class="help-block">
                            <strong>{{$errors->first('location')}}</strong>
                        </span>
                        @endif
                        </div>

                        <div class="form-group {{$errors->has('number') ? 'has-error' : '' }}">
                            <label for="number">Número da Sala</label>
                            <input type="text" name="number" class="form-control" placeholder="Descreva o numero da sala">
                        @if($errors->has('number'))
                        <span class="help-block">
                            <strong>{{$errors->first('number')}}</strong>
                        </span>
                        @endif
                        </div>

                        <div class="form-group {{$errors->has('capacity') ? 'has-error' : '' }}">
                            <label for="capacity">Capacidade da sala</label>
                            <input type="text" name="capacity" class="form-control" placeholder="Descreva a capacidade da sala">
                        @if($errors->has('capacity'))
                        <span class="help-block">
                            <strong>{{$errors->first('capacity')}}</strong>
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

                        <div class="form-group">
                           <label>Equipamento</label>
                           <div class="select2-purple">
                                <select class="select2" multiple="multiple" data-placeholder="Selecione os Equipamentos" data-dropdown-css-class="select2-purple" name="equipament_id" id="equipament_id" style="width: 100%;" >    
                                    @foreach($results as $equipament)
                                        <option value="{{ $equipament->id }}">{{ $equipament->name }}</option>
                                    @endforeach
                                </select>
                                <br>
                            </div>
                            <input type="button" class="form-control" value="Adicionar um equipamento" data-toggle="modal" data-target="#myModalcad">
                            <br>
                        <div class="form-group {{$errors->has('description') ? 'has-error' : '' }}">
                        <label for="description">Descrição</label>
                            <textarea for="description" type="text" id="description" class="form-control rounded-0 {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description') }}" required autofocus>Descrição</textarea>

                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                        </div>

                        

                        <button class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Adicionar</button> 
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


                                         <!-- Inicio Modal -->
                                    <div class="modal fade" id="myModalcad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title text-center" id="myModalLabel">Cadastrar Equipamento</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form action=" {{ route('equipament.saveModal') }}" method="post">
                                                    {{ csrf_field() }}
                                                    
                                                    <div class="form-group {{$errors->has('name') ? 'has-error' : '' }}">
                                                        <label for="recipient-name" class="control-label">Nome:</label>
                                                        <input name="name" type="text" class="form-control">
                                                        @if($errors->has('name'))
                                                            <span class="help-block">
                                                            <strong>{{$errors->first('name')}}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label for="message-text" class="control-label">Detalhes:</label>
                                                        <textarea name="description" class="form-control"></textarea>
                                                    </div>

                                                    <div class="form-group">
                                                    <label>Status</label>
                                                        <select class="form-control" name="active" id="active">
                                                            <option value="1">Ativo</option>
                                                            <option value="0">Inativo</option>
                                                        </select>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success">Cadastrar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Fim Modal -->

@stop



