@extends('adminlte::page')

@section('title', 'Cadastro de Exames')

@section('content')

<div class="box box-primary">
        <div class="box-header with-border">
           <h3 class="box-title">Cadastro de Exames</h3>
        </div>
        <div role="form">
               <div class="box-body">
               @include('sweet::alert')

                    <form action="{{ route('Exam.save') }}" method="post">
                    {{ csrf_field() }}


                        <!-- Fazer esse formulário de editar também value= "{ {$results->email or old('email')}}" -->
                        <div class="form-group">
                            <label>Paciente</label>
                            <select class="form-control"  name="patients_id" id="patients_id">
                                <option value="">Selecione um Paciente</option>       
                                @foreach($paciente as $pacientes)
                                <option required value="{{ $pacientes->id }}">{{ $pacientes->name }}</option>
                                    @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Agendamento</label>
                            <select class="form-control"  name="id_schedules_exam" id="id_schedules_exam">
                                @foreach($id_Agenda as $id_Agendas)
                                    <option required value="{{ $id_Agendas->id }}">{{ $id_Agendas->title }} - Dia Agendado: {{ $id_Agendas->start_date }}</option>
                                @endforeach
                            </select>
                        </div>
                            

                        <div class="form-group">
                            <label >Data Agendada</label>
                            <input type="text" name="scheduled_date" value="{{ $id_Agendas->start_date }}" id= "scheduled_date"  class="form-control">
                        </div>

                        <div class="form-group">
                                <label >Data Realizada</label>
                                <input type="text" name="performed_date" value="{{ $id_Agendas->start_date }}" id= "performed_date"  class="form-control">
                        </div>
                        
                        <div class="form-group">
                                <label for="description">Descricao</label>
                                <input type="text" name="description" class="form-control" placeholder="Descriçao">
                        </div>

                        <div class="form-group">
                            <label>Funcionário Responsável</label>
                            <select class="form-control"  name="employee_id" id="employee_id">
                                <option   value="">Selecione um Funiconario</option>       
                                @foreach($funcionario as $funcionarios)
                                    <option required value="{{ $funcionarios->id }}">{{ $funcionarios->name }}</option>
                                @endforeach
                            </select>
                        </div>       

                        <div class="form-group">
                                <label>Médico Responsável</label>
                                <select class="form-control"  name="doctor_performer_id" id="doctor_performer_id">
                                <option   value="">Selecione um Médico</option>       
                                    @foreach($medico as $medicos)
                                        <option required value="{{ $medicos->id }}">{{ $medicos->name }}</option>
                                    @endforeach
                                </select>
                        </div>   

                        <div class="form-group">
                                <label for="status" >Status</label>
                                <div required name="status" class="auto-control" value="{{ old('status') }}" required autofocus>
                                <select class="form-control"  id = "status" name="status" onchange="habilitaBtn()" >
                                    <option value="Agendado">Agendado</option>
                                    <option value="Realizado">Realizado</option>
                                    <!--<option value="Pendente">Pendente</option>-->
                                    <option value="Cancelado">Cancelado</option>
                                </select>
                                @if($errors->has('status'))
                                <span class="help-block">
                                    <strong>{{$errors->first('status')}}</strong>
                                </span>
                                @endif
                                </div>
                        </div>  

                        <button  class=" form-group btn btn-primary"><i class="glyphicon glyphicon-plus"></i >Novo Exame</button>

                    </div>

                        
                    </form>
                </div>
            </div>
        </div>
@stop