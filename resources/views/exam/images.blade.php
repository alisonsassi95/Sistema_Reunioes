@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Imagens Do Exame</h1>
@stop

@section('content')
<div class="panel-body">
        <form enctype="multipart/form-data" action="{{route('Examimage.UparImagens')}}" method="POST">
        
            <label>Enviar imagens do Exame</label>
                <div class="form-group">
                    <div class="row">
                    @include('sweet::alert')
                        <div class="col-xs-4" value= "{{ old('exam_id')}}">
                                <label>Id Exame</label>
                                <input readonly type="text" id='exam_id' name="exam_id" value='{{$exm->id}}' class="form-control"> 
                        </div>
                        <div class="col-xs-4">
                                <label>Data</label>
                                <input readonly type="text" id='Data' name="Data" value='{{date('Y-m-d H:i')}}' class="form-control"> 
                        </div>
                    </div>
            </div>
                   
            <input type="file" name="imagem">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <br>
            <input type="submit" class="btn btn-primary btn-block"> 
        </form>
</div>
@stop