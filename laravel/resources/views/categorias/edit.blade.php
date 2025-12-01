@extends('layouts.app')
@section('title','Editar Categoria')
@section('content')
  <h3>Editar Categoria</h3>
  <form action="{{ route('categorias.update', $categoria) }}" method="POST">
    @csrf @method('PUT')
    <div class="mb-3">
      <label class="form-label">Nome</label>
      <input name="nome" class="form-control" value="{{ old('nome', $categoria->nome) }}">
      @error('nome') <div class="text-danger">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3">
      <label class="form-label">Descrição</label>
      <textarea name="descricao" class="form-control">{{ old('descricao', $categoria->descricao) }}</textarea>
    </div>
    <button class="btn btn-primary">Atualizar</button>
  </form>
@endsection
