@extends('layouts.app')
@section('title','Editar Hambúrguer')
@section('content')
  <h3>Editar Hambúrguer</h3>
  <form action="{{ route('hamburgueres.update', $hamburguer) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
    <div class="mb-3">
      <label class="form-label">Nome</label>
      <input name="nome" value="{{ old('nome', $hamburguer->nome) }}" class="form-control">
      @error('nome') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
      <label class="form-label">Descrição</label>
      <textarea name="descricao" class="form-control">{{ old('descricao', $hamburguer->descricao) }}</textarea>
    </div>

    <div class="mb-3">
      <label class="form-label">Preço</label>
      <input name="preco" value="{{ old('preco', $hamburguer->preco) }}" class="form-control">
      @error('preco') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
      <label class="form-label">Categoria</label>
      <select name="categoria_id" class="form-control">
        <option value="">-- selecione --</option>
        @foreach($categorias as $c)
          <option value="{{ $c->id }}" @selected(old('categoria_id', $hamburguer->categoria_id) == $c->id)>{{ $c->nome }}</option>
        @endforeach
      </select>
      @error('categoria_id') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
      <label class="form-label">Imagem atual</label><br>
      @if($hamburguer->imagem)
        <img src="{{ asset('storage/' . $hamburguer->imagem) }}" style="height:120px; object-fit:cover;">
      @else
        <p>Sem imagem</p>
      @endif
    </div>

    <div class="mb-3">
      <label class="form-label">Nova imagem (opcional)</label>
      <input type="file" name="imagem" accept="image/png, image/jpeg" class="form-control">
      @error('imagem') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <button class="btn btn-primary">Atualizar</button>
  </form>
@endsection
