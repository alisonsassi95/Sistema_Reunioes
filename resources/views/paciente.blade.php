@extends('adminlte::page')

@section('title', 'Cadastro de Exames')

@section('content')

<!-- View Cadastro de Exames -->

<div class="box box-primary">
        <div class="box-header with-border">
           <h3 class="box-title">Meus Exames</h3>
        </div>
        <div role="form">
               <div class="box-body">
                    <table id="tableDepartament" class="table table-bordered table-striped dataTable" role="grid">
                      <thead>
                          <tr>
                              <th>Data Agendada</th>
                              <th>Médico</th>
                              <th>Data Realizada</th>
                              <th>Tipo Exame</th>
                              <th>Staus</th>
                              <th>Ação</th>
                              </tr>
                      </thead>
                      <tbody>
                      @foreach($results as $x)
                      <tr>
                             
                              <td>{{ $x->Data_Agendada }}</td>
                              <td>{{ $x->medico }}</td>
                              <td>{{ $x->Data_Realizada }}</td>
                              <td>{{ $x->Tipo_Exame }}</td>
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
                                <a class="btn btn-primary" href="{{route('Exam.visualizar',$x->id)}}">Ver Imagens</a>
                                <a class="btn btn-warning" href="{{route('print',$x->id)}}">Ver Laudo</a>
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

