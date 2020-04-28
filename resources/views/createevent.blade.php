<!-- createevent.blade.php -->
@extends('adminlte::page')

@section('title', 'Agendar um Exame')

@section('content')

<div class="box box-primary">
    <div class="box-header with-border">
       <h3 class="box-title">Cadastro de Exames</h3>
    </div>
    <div role="form">
    <div class="box-body">

      <form method="post" action="{{url('event/add')}}">
        @csrf


          <div class="form-group">
            <label for="Title">Descrição</label>
            <input  required type="text" class="form-control" name="title">
          </div>


          <div class="form-group">
            <strong> Data inicial</strong>  
            <input  required class="date form-control" value='2019-06-29 08:00:00' type="text" id="startdate" name="startdate">   
         </div>



          <div class="form-group">
            <strong> Data final</strong>  
            <input required class="date form-control" value='2019-06-29 12:00:00' type="text" id="enddate" name="enddate">   
         </div>


        

         <div class="form-group">
        <label>Médico</label>
        <select class="form-control"  name="doctor_requests_id" id="doctor_requests_id">
            <option   value="">Selecione um Médico</option>       
            @foreach($medico as $medicos)
                <option required value="{{ $medicos->id }}">{{ $medicos->name }}</option>
            @endforeach
        </select>
      </div>

        
        <div class="form-group">
        <label>Pacientes</label>
        <select class="form-control"  name="patients_id" id="patients_id">
            <option   value="">Selecione um Pacientes</option>       
            @foreach($paciente as $pacientes)
                <option required value="{{ $pacientes->id }}">{{ $pacientes->name }}</option>
            @endforeach
        </select>
      </div>



      <div class="form-group">
        <label>Equipamentos</label>
        <select class="form-control"  name="equipament_id" id="equipament_id">
            <option   value="">Selecione um Equipamentos</option>       
            @foreach($equipamento as $equipamentos)
                <option required value="{{ $equipamentos->id }}">{{ $equipamentos->name }}</option>
            @endforeach
        </select>
      </div>

                  <div class="form-group">
                    <strong> Convênio</strong>  
                    <input class="date form-control"  type="text" id="convenant" name="convenant">   
                 </div>

  


            <div class="form-group">
              <strong> Observação</strong>  
              <input class="date form-control"  type="text" id="note" name="note">   
           </div>

        
<!-- https://eonasdan.github.io/bootstrap-datetimepicker/-->


          <div class="form-group">
            <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i > Adicionar</button>
          </div>

      </form>
    </div>
    </div>
</div>


@stop