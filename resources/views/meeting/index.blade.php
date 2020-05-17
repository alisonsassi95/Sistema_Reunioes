@extends('adminlte::page')

@section('title', 'Cadastro de Exames')

@section('content')

<div class="box box-primary">
        <div class="box-header with-border">
        @include('sweet::alert')
           <h3 class="box-title">Exames</h3>
        </div>
        <div role="form">
               <div class="box-body">
                    
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                     <table id="tableDepartament" class="table table-bordered table-striped dataTable" role="grid">
                        <thead>
                            <tr>
                                
                                <th>Paciente</th>
                                <th>Médico</th>
                                <th>Data Realizada</th>
                                <th>Tipo Equipamento</th>
                                <th>Staus</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>

                        @foreach($results as $x)
                        <tr>
                                
                                <td>{{ $x->paciente }}</td>
                                <td>{{ $x->medico }}</td>
                                <td>{{ $x->dataRealizada }}</td>
                                <td>{{ $x->TipoEquipaments }}</td>
                                <td> 
                                    @if($x->status == 'Agendado')
                                        <span type="label" class="btn btn-block btn-info disabled">{{$x->status}}</span>
                                    @elseif ($x->status == 'Realizado')
                                        <span type="label" class="btn btn-block btn-success disabled">{{$x->status}}</span>
                                    @elseif ($x->status == 'Cancelado')
                                        <span type="label" class="btn btn-block btn-danger disabled">{{$x->status}}</span>
                                    @elseif ($x->status == 'Solicitado')
                                        <span type="label" class="btn btn-block btn-warning disabled">{{$x->status}}</span>
                                    @else
                                        <span type="label" class="btn btn-block btn-default disabled">{{$x->status}}</span>
                                    @endif
                                </td>
                                <td>    
                                    <a class="btn btn-default" href="{{route('Exam.edit',$x->id)}}"><i class="glyphicon glyphicon-edit"></i >  Editar</a>
                                    <a class="btn btn-danger" href="javascript:(confirm('Deletar esse registro?') ? window.location.href='{{route('Exam.delete',$x->id)}}' : false)"><i class="glyphicon glyphicon-trash"></i > Deletar</a>
                                    <a class="btn btn-primary" href="{{route('Exam.images',$x->id)}}"><i class="glyphicon glyphicon-upload"></i >  Adicionar Imagens</a>
                                </td>
                            <tr>
                        @endforeach                           
                        </tbody>
                    </table>

                    <div align="center">
                        {!! $results->links() !!}
                    </div> 

                    <p><a class="btn btn-primary" href="{{route('Exam.add')}}"><i class="glyphicon glyphicon-plus"></i > Novo Exame</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

