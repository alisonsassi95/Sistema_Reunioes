@extends('adminlte::page')

@section('title', 'Editar Pessoas')

@section('content')
 
 <!-- Inicio Modal -->
 <div class="box box-primary">
 <div class="box-header with-border">
 @include('sweet::alert')
    <h3 class="box-title">Editar especialidades</h3>
 </div>
    <div role="form">
        <div class="box-body">
            <div class="form-group col-md-12">
                                    <form action="{{ route('specialty.save') }}" method="post">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="recipient-name" class="control-label">Nome:</label>
                                            <input name="name" type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="message-text" class="control-label">Detalhes:</label>
                                            <textarea name="description" class="form-control"></textarea>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary"><i class="glyphicon glyphicon-ok"></i > Cadastrar</button>
                                        </div>
                                    </form>
                                    @if (Session::has('message'))
                                    <div class="alert alert-success">{{ Session::get('message') }}</div>
                                    @endif 
            </div>
        </div>
    </div>
</div>
                                              
<!-- Fim Modal -->

@stop