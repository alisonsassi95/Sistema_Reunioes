@extends('adminlte::page')

@section('title', 'Visualizar Imagens de Exames')

@section('content')
<div class="box box-primary">
        <div class="box-header with-border">
           <h3 class="box-title">Exames de Pacientes</h3>
        </div>
        <div role="form">
               <div class="box-body">
               @include('sweet::alert')
                    
                    <table id="tableDepartament" class="table table-bordered table-striped dataTable" role="grid">
                        <thead>
                            <tr>
                                
                                <th>Paciente</th>
                                <th>Médico</th>
                                <th>Data Realizada</th>
                                <th>Tipo Equipamento</th>
                                <th>Status</th>
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
                                    <a class="btn btn-primary" href="{{route('Exam.visualizar',$x->id)}}"><i class="glyphicon glyphicon-picture"></i > Ver Imagens</a>
                                    <a class="btn btn-warning" href="{{route('diagnostic.view',$x->id)}}"><i class="glyphicon glyphicon-list-alt"></i > Ver Laudo</a>
                                </td>
                            <tr>
                        @endforeach                           
                        </tbody>
                    </table>

                    <div align="center">
                        {!! $results->links() !!}
                    </div> 

                </div>
            </div>
        </div>
    </div>
</div>
@stop

