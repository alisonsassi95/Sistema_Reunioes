<!-- createevent.blade.php -->
@extends('adminlte::page')

@section('title', 'Agendar um Exame')

@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
    @include('sweet::alert')
       <h3 class="box-title">Agende seu horário</h3>
    </div>
    <div role="form">
    <div class="box-body">
      <form method="post" action="{{url('event/client')}}">
        @csrf

       <div class="form-group ">
          <label>Meu Nome</label>
          
          <select class="form-control"  name="patients_id" id="patients_id">      
                  <option Selected value="{{Auth::user()->people_id}}">{{Auth::user()->name}}</option>
          </select>
        </div>
      
        <div class="form-group">
          <label>Equipamento</label>
          <select class="form-control"  name="equipament_id" id="equipament_id">
              <option   value="">Selecione um Equipamento</option>       
              @foreach($equipamento as $equipamentos)
                  <option required value="{{ $equipamentos->id }}">{{ $equipamentos->name }}</option>
              @endforeach
          </select>
        </div>

          <div class="form-group {{$errors->has('title') ? 'has-error' : '' }}">
            <label for="Title">Titulo da Agenda:</label>
            <input type="text" class="form-control" name="title">
              @if($errors->has('title'))
                <span class="help-block">
                  <strong>{{$errors->first('title')}}</strong>
                </span>
              @endif
          </div>
        

          <div class="form-group ">
            <strong> Data inicial : </strong>  
            <input  required class="date form-control" value='2019-06-29 08:00:00' type="text" id="startdate" name="startdate">   
         </div>
        

          <div class="form-group ">
            <strong> Data final : </strong>  
            <input required class="date form-control" value='2019-06-29 12:00:00' type="text" id="enddate" name="enddate">   
         </div>
        


            <div class="form-group ">
              <strong> Convênio : </strong>  
              <input class="date form-control"  type="text" id="convenant" name="convenant">   
            </div>
          
  


            <div class="form-group ">
              <strong> Observação : </strong>  
              <input class="date form-control"  type="text" id="note" name="note">   
           </div>
           
        
          <div class="form-group ">
            <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-calendar"></i > Agendar</button>
          </div>
        
      </form>
    </div>
@stop