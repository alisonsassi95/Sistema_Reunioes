@extends('adminlte::page')

@section('title', 'Listas de Meeting')

@section('content')
<div class="box box-primary">
        <div class="box-header with-border">
           <h3 class="box-title">Consulta</h3>
        </div>

            <div class="panel-body">
                
            @include('sweet::alert')

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                   
                    <table id="tableDepartament" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="listEquip">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Ativo</th>
                                <th>Descrição</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                               
                        @foreach($meetings as $meeting)
                        
                        <tr>
                                <td>{{ $meeting->name }}</td>                             
                                <td> 
                                    @if($meeting->active  == 1)
                                        Ativo
                                    @else
                                        Inativo
                                    @endif
                                </td>
                                
                                <td>{{ $meeting->description }}</td>
                                <td>
                                    <a class="btn btn-default" href="{{route('meeting.edit',$meeting->id)}}"><i class="glyphicon glyphicon-edit"></i >Editar</a>
                                    <a class="btn btn-danger" href="{{route('meeting.delete',$meeting->id)}}' : false)"><i class="glyphicon glyphicon-trash"></i >Deletar</a>
                                </td>
                            <tr>
                        
                        @endforeach
                            
                        </tbody>

                    </table>
                    <div align="center">
                        {!! $meetings->links() !!}
                    </div> 

                    
                    <a class="btn btn-primary" href="{{route('meeting.add')}}"><i class="glyphicon glyphicon-plus"></i > Adicionar</a>
                    

        </div>
    </div>
</div>
@stop

@section('js')
    
@endsection
