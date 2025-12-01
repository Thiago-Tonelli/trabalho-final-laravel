@extends('layouts.app')
@section('title', $categoria->nome)
@section('content')
  <h3>{{ $categoria->nome }}</h3>
  <p>{{ $categoria->descricao }}</p>

  <h5>Hambúrgueres nessa categoria</h5>
  <div class="row">
    @forelse($categoria->hamburgueres as $h)
      <div class="col-md-4 mb-3">
        <div class="card">
          @if($h->imagem)
            <img src="{{ asset('storage/' . $h->imagem) }}" class="card-img-top" style="height:180px; object-fit:cover;">
          @endif
          <div class="card-body">
            <h5>{{ $h->nome }}</h5>
            <p>{{ Str::limit($h->descricao, 80) }}</p>
            <p><strong>R$ {{ number_format($h->preco,2,',','.') }}</strong></p>
          </div>
        </div>
      </div>
    @empty
      <p>Nenhum hambúrguer cadastrado.</p>
    @endforelse
  </div>
@endsection
