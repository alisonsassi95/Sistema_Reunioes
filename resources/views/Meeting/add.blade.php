@extends('adminlte::page')

@section('title', 'Cadastro de Reunião')

@section('content')

<div class="box box-primary">
 <div class="box-header with-border">
    <h3 class="box-title">Cadastro de Reunião</h3>
 </div>
 <div role="form">
        <div class="box-body">
            @include('sweet::alert')

                    <form action="{{ route('meeting.save') }}" method="post">
                    {{ csrf_field() }}

                    <div hidden class="form-group row">
                        <div  class="col-sm-8">
                        <input  readOnly = "true" type="text" name="requester_id" value = "1" class="form-control" id="requester_id">
                        </div>
                    </div>
                    <div class="form-group row {{$errors->has('title') ? 'has-error' : '' }}" value="{{ old('title') }}">
                            <label for="title" class="col-sm-4 col-form-label">Titulo</label>
                            <div class="col-sm-8">
                                <input type="text" required name="title" class="form-control" id="title">
                                <input type="hidden" name="id">
                            </div>
                        @if($errors->has('title'))
                            <span class="help-block">
                                <strong>{{$errors->first('title')}}</strong>
                            </span>
                        @endif
                        </div>


                        <div class="form-group row">
                            <label for="start" class="col-sm-4 col-form-label">Data/hora Inicial</label>
                            <div class="col-sm-8">
                                <input type="datetime-local" required name="start" value = "<?php gmDate("Y-m-d H:i:s")?>" class="form-control date-time" id="start">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="end" class="col-sm-4 col-form-label">Data/hora Final</label>
                            <div class="col-sm-8">
                                <input type="datetime-local" required name="end" class="form-control date-time" id="end">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="color" class="col-sm-4 col-form-label">Cor do Evento</label>
                            <div class="col-sm-8">
                                <input type="color" name="color" class="form-control" id="color">
                            </div>
                        </div>

                        <div class="form-group row">
                        <label for="room_id" class="col-sm-4 col-form-label">Sala</label>
                            <div class="col-sm-8">
                                <select class="form-control" class="col-sm-8" name="room_id" id="room_id">
                                <option value="" disabled selected>Escolha a sala</option>
                                @if(empty($rooms)){
                                    <option value="0"> Sem Sala disponível</option>
                                }@endif
                                @foreach($rooms as $room)
                                        <option value="{{ $room->id }}">{{ $room->name }}</option>
                                    @endforeach
                                
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                        <label for="priority" class="col-sm-4 col-form-label">Prioridade</label>
                            <div class="col-sm-8">
                                <select class="form-control" class="col-sm-8" name="priority" id="priority">
                                    <option value="Urgente">Urgente</option>
                                    <option value="Normal">Normal</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="condition" class="col-sm-4 col-form-label">Estado da reunião</label>
                            <div class="col-sm-8">
                                <input readOnly = "true" type="text" name="condition" value = "Reunião agendada" class="form-control" id="condition">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="participants" class="col-sm-4 col-form-label">Participantes</label>
                            <div class="col-sm-8">
                                <select id="participants" name="participants[]" width = "20" class="mdb-select md-form colorful-select dropdown-primary" multiple searchable="Pesquise por nome">
                                    <option value="" disabled selected>Escolha os participantes</option>
                                    @foreach($parts as $part)
                                        <option value="{{ $part->id }}">{{ $part->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
 
                        <div class="form-group row">
                            <label for="description" class="col-sm-4 col-form-label">Descrição</label>
                            <div class="col-sm-8">
                                <textarea name="description" id="description" cols="80" rows="4"></textarea>
                            </div>
                        </div>

                        <button class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Adicionar</button> 
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
<script type="text/javascript">
    function habilitaBtn () {
        var start = document.getElementById("start").value;
        var end = document.getElementById("end").value;

        if (!mpty($start) && (!empty($end))) {
            document.getElementById('room_id').style.display = 'block';
                echo "Por favor, preencha a data.";
        }
        else if{
            document.getElementById('funcionario').style.display = 'none';
            document.getElementById('medico').style.display = 'block';
        }
            
    }
</script>
