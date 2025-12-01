@extends('layouts.app')
@section('title','Início')
@section('content')
  <div class="jumbotron">
    <h1>🍔 BurgerMaster</h1>
    <p>{{ $mensagem }}</p>
    <p>Última categoria visitada: 
      @if(request()->cookie('ultima_categoria'))
        {{ \App\Models\Categoria::find(request()->cookie('ultima_categoria'))->nome ?? '—' }}
      @else
        Nenhuma
      @endif
    </p>
  </div>
@endsection
