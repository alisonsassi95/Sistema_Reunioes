@extends('adminlte::page')

@section('title', 'Listas de Salas')

@section('content')
<div class="box box-primary">
        <div class="box-header with-border">
           <h3 class="box-title">Salas</h3>
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
                                <th>Local</th>
                                <th>Número</th>
                                <th>Capacidade</th>
                                <th>Ativo</th>
                                <th>Descrição</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                               
                        @foreach($rooms as $room)
                        
                        <tr>
                                <td>{{ $room->name }}</td>
                                <td>{{ $room->location }}</td>
                                <td>{{ $room->number }}</td>
                                <td>{{ $room->capacity }}</td>
                                <td> 
                                    @if($room->active  == 1)
                                        Ativo
                                    @else
                                        Inativo
                                    @endif
                                </td>
                                
                                <td>{{ $room->description }}</td>
                                
                                <td>
                                    <a class="btn btn-default" href="{{route('room.edit',$room->id)}}"><i class="glyphicon glyphicon-edit"></i >Editar</a>
                                    <a class="btn btn-danger" href="{{route('room.delete',$room->id)}}' : false)"><i class="glyphicon glyphicon-trash"></i >Deletar</a>
                                </td>
                            <tr>
                        
                        @endforeach
                            
                        </tbody>

                    </table>
                    <div align="center">
                        {!! $rooms->links() !!}
                    </div> 

                    
                    <a class="btn btn-primary" href="{{route('room.add')}}"><i class="glyphicon glyphicon-plus"></i > Adicionar</a>
                    

        </div>
    </div>
</div>
@stop

@section('js')
    
@endsection
