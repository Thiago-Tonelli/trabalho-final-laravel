@extends('layouts.app')
@section('title','Nova Categoria')
@section('content')
  <h3>Criar Categoria</h3>
  <form action="{{ route('categorias.store') }}" method="POST">
    @csrf
    <div class="mb-3">
      <label class="form-label">Nome</label>
      <input name="nome" class="form-control" value="{{ old('nome') }}">
      @error('nome') <div class="text-danger">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3">
      <label class="form-label">Descrição</label>
      <textarea name="descricao" class="form-control">{{ old('descricao') }}</textarea>
    </div>
    <button class="btn btn-primary">Salvar</button>
  </form>
@endsection
