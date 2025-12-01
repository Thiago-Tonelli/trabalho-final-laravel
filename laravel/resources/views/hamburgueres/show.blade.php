@extends('layouts.app')
@section('title', $hamburguer->nome)
@section('content')
  <div class="row">
    <div class="col-md-6">
      @if($hamburguer->imagem)
        <img src="{{ asset('storage/' . $hamburguer->imagem) }}" class="img-fluid">
      @endif
    </div>
    <div class="col-md-6">
      <h3>{{ $hamburguer->nome }}</h3>
      <p>{{ $hamburguer->descricao }}</p>
      <p><strong>R$ {{ number_format($hamburguer->preco,2,',','.') }}</strong></p>
      <p>Categoria: {{ $hamburguer->categoria->nome ?? '—' }}</p>
    </div>
  </div>
@endsection
