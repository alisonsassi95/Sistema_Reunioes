@extends('adminlte::page')

@section('title', 'Cadastro de Exames')

@section('content')

<script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>

<div class="box box-primary">
        <div class="box-header with-border">
           <h3 class="box-title">Visualização de Laudo</h3>
        </div>
               <div class="box-body">
                <form>                  

                       <div class="form-group row">

                            

                        <div class="form-group col-md-2">
                            <label for="exam_id">ID do Exame</label>
                            <input readonly type="text" value="{{$diagnostic->exam_id}}" class="form-control" id="exam_id" name="exam_id"> 
                        </div>

                        <div class="form-group col-md-2">
                                <label for="status">Status do Laudo</label>
                                <input readonly type="text" value="{{$diagnostic->status}}" class="form-control" id="status" name="status">
                        </div>
                            
                        <div class="form-group col-md-4">
                            <label>Paciente</label>
                            <input readonly type="text" value="{{$exam->name}}" class="form-control" id="patients_id" name="patients_id">
                        </div>

                        <div class="form-group col-md-4">
                            <label>Medico radiologista</label>
                            <input readonly type="text" value="{{$medic->name}}" class="form-control" id="doctor_performer_id" name="doctor_performer_id">
                              
                                
                            </select>
                        </div>             

                    </div>


                    <div class="container" >
                    
                    <label for="diagnostic">Laudo</label>
                    <textarea style="font: 12px Arial, Helvetica, sans-serif" cols="5" rows="28" disabled class="form-control" name="diagnostic" id="diagnostic">{{$diagnostic->diagnostic}}</textarea>
                     
                    </div>

                    <hr>  
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <a class="btn btn-warning" href="{{route('print',$diagnostic->exam_id)}}"><i class="glyphicon glyphicon-print"></i >Imprimir</a>
                        <a class="btn btn-success" href="{{route('edit',$diagnostic->exam_id)}}"><i class="glyphicon glyphicon-edit"></i >Editar</a>  
                    </form>      

        </div>
</div>

<style>#container {width:100%; text-align:center;}</style>

@endsection

@section('js')
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'teste' );
    </script>
@append