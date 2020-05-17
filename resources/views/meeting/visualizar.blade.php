@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Imagens Do Exame</h1>
@stop

@section('content')
  <div class="panel-body">
      @if($ImagemExame[0]->imagem !== null)
        @foreach ($ImagemExame as $img)
          <img width="300" height="300" src="{{asset("imagens/Exames/".$img->imagem)}}"   alt="">
          @endforeach
      @else
      <style>
        div.a {
        text-align: center;
        }
      </style>
        <div class="a">
          <h1>Não existe imagem!</h1>
        </div>
          
          
      @endif
  </div>
@stop
