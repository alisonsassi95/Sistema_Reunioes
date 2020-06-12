@extends('adminlte::page')

@section('title', 'Cadastro de Equipamentos')

@section('content')

<div class="box box-primary">
 <div class="box-header with-border">
    <h3 class="box-title">Cadastro de Equipamentos</h3>
 </div>
 <div role="form">
        <div class="box-body">
            @include('sweet::alert')

                    <form action="{{ route('equipament.save') }}" method="post">
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

                        

                        <button class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Adicionar</button> 
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

                             
@stop



