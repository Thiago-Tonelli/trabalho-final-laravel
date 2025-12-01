@extends('layouts.app')
@section('title','Categorias')
@section('content')
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Categorias</h3>
    @if(session('usuario_logado'))
      <a href="{{ route('categorias.create') }}" class="btn btn-success">Nova Categoria</a>
    @endif
  </div>

  <table class="table table-striped">
    <thead><tr><th>Nome</th><th>Descrição</th><th>Ações</th></tr></thead>
    <tbody>
      @foreach($categorias as $cat)
        <tr>
          <td><a href="{{ route('categorias.show', $cat) }}">{{ $cat->nome }}</a></td>
          <td>{{ Str::limit($cat->descricao, 60) }}</td>
          <td>
            <a href="{{ route('categorias.show', $cat) }}" class="btn btn-sm btn-outline-primary">Ver</a>
            @if(session('usuario_logado'))
              <a href="{{ route('categorias.edit', $cat) }}" class="btn btn-sm btn-warning">Editar</a>
              <form action="{{ route('categorias.destroy', $cat) }}" method="POST" class="d-inline" onsubmit="return confirm('Remover?')">
                @csrf @method('DELETE')
                <button class="btn btn-sm btn-danger">Excluir</button>
              </form>
            @endif
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

  {{ $categorias->links() }}
@endsection
