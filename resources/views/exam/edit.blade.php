@extends('adminlte::page')

@section('title', 'Editar Exames')

@section('content')

<div class="box box-primary">
 <div class="box-header with-border">
    <h3 class="box-title">Edição de Exames</h3>
 </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
        @include('sweet::alert')
            <div class="panel panel-default">

            <ol class="breadcrumb panel-heading" >
            <li><a style="font-size:110%" href="{{ route('Exam.index') }}"><b>Exames</b></a></li>
            <li class="active" style="font-size:110%">Editar</li>
            </ol>

                    <form action="{{ route('Exam.update', $Exam->id) }}" method="post">
                    {{ csrf_field() }}

                    <input type="hidden" name="_method" value="put">


                    <label>Paciente</label>
                    <select class="form-control"  name="patients_id" id="patients_id">
                        @foreach($paciente as $pacientes)
                        <option selected disabled=true value="{{ $pacientes->id }}">{{ $pacientes->name }}</option>                            
                        @endforeach  
                    </select>


                    <label>Dia Agendado</label>
                    <select class="form-control"  name="id_schedules_exam" id="id_schedules_exam">
                            @foreach($id_Agenda as $id_Agendas)
                            <option selected disabled=true value="{{ $id_Agendas->id }}">{{ $id_Agendas->title }} - Dia Agendado: {{ $id_Agendas->start_date }}</option>
                            @endforeach 
                    </select>

                    <div class="form-group" >
                            <label >Data Agendada</label>
                            <input disabled=true type="text" name="performed_date" value="{{ $id_Agendas->start_date }}" id= "performed_date"  class="form-control">
                    </div>

                    <div class="form-group" >
                            <label >Data Realizada</label>
                            <input type="text" name="performed_date" value="{{ $id_Agendas->start_date }}" id= "performed_date"  class="form-control">
                    </div>

                    <div class="form-group" value= "{{ old('description')}}" >
                        <label for="description">Descricao</label>
                        <input type="text"  value="{{ $Exam->description }}" name="description" value='OBS:' class="form-control" placeholder="Descriçao">
                    </div>

                    <label>funcionário Responsável</label>
                    <select class="form-control"  name="employee_id" id="employee_id">
                        <option   value="">Selecione um Funiconario</option>       
                        @foreach($funcionario as $funcionarios)
                            <option required value="{{ $funcionarios->id }}">{{ $funcionarios->name }}</option>
                        @endforeach
                    </select>


                    <label>Médico Responsável</label>
                    <select class="form-control"  name="doctor_performer_id" id="doctor_performer_id">
                        <option   value="">Selecione um Médico</option>       
                        @foreach($medico as $medicos)
                            <option selected required value="{{ $medicos->id }}">{{ $medicos->name }}</option>
                        @endforeach
                    </select>


                    <div class="form-group">
                        <label for="status" >Status</label>
                        <div required name="status" class="auto-control" value="{{ old('status') }}" required autofocus>
                        <select class="form-control"  id = "status" name="status" onchange="habilitaBtn()" >
                            <option value="{{$status}}">{{$status}}</option>                            
                            <option value="Agendado">Agendado</option>
                            <option value="Realizado">Realizado</option>
                            <option value="Cancelado">Cancelado</option>
                        </select>
                        @if($errors->has('status'))
                        <span class="help-block">
                            <strong>{{$errors->first('status')}}</strong>
                        </span>
                        @endif
                        </div>
                    </div>

                        <button class=" form-group btn btn-info" ><i class="glyphicon glyphicon-save"></i >Salvar</button>
                    </form>
                    @if (Session::has('message'))
                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@stop
