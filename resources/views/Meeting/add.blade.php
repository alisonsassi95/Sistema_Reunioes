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

                    <div class="form-group row">
                            <label for="title" class="col-sm-4 col-form-label">Titulo</label>
                            <div class="col-sm-8">
                                <input type="text" name="title" class="form-control" id="title">
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

                        <button class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Adicionar</button> 
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<Script>
$(function() {

$('.date-time').mask('00/00/0000 00:00:00');
$('.time').mask('00:00:00');
</script>


@stop



