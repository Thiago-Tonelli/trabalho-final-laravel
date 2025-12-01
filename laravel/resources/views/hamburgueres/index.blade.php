@extends('layouts.app')
@section('title','Cardápio')
@section('content')
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Cardápio</h3>
    @if(session('usuario_logado'))
      <a href="{{ route('hamburgueres.create') }}" class="btn btn-success">Novo Hambúrguer</a>
    @endif
  </div>

  <div class="row">
    @foreach($hamburgueres as $h)
      <div class="col-md-4 mb-3">
        <div class="card h-100">
          @if($h->imagem)
            <img src="{{ asset('storage/' . $h->imagem) }}" class="card-img-top" style="height:200px; object-fit:cover;">
          @endif
          <div class="card-body">
            <h5>{{ $h->nome }}</h5>
            <p>{{ Str::limit($h->descricao, 80) }}</p>
            <p><strong>R$ {{ number_format($h->preco,2,',','.') }}</strong></p>
            <p>Categoria: {{ $h->categoria->nome ?? '—' }}</p>
            <a href="{{ route('hamburgueres.show', $h) }}" class="btn btn-sm btn-outline-primary">Ver</a>
            @if(session('usuario_logado'))
              <a href="{{ route('hamburgueres.edit', $h) }}" class="btn btn-sm btn-warning">Editar</a>
              <form method="POST" action="{{ route('hamburgueres.destroy', $h) }}" class="d-inline" onsubmit="return confirm('Remover?')">
                @csrf @method('DELETE')
                <button class="btn btn-sm btn-danger">Excluir</button>
              </form>
            @endif
          </div>
        </div>
      </div>
    @endforeach
  </div>

  {{ $hamburgueres->links() }}
@endsection
