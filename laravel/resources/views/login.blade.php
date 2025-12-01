@extends('layouts.app')
@section('title','Login')
@section('content')
  <div class="row justify-content-center">
    <div class="col-md-6">
      <h3>Login Administrativo</h3>
      <form method="POST" action="{{ route('login.auth') }}">
        @csrf
        <div class="mb-3">
          <label class="form-label">Usuário</label>
          <input name="usuario" value="{{ old('usuario') }}" class="form-control">
          @error('usuario') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
          <label class="form-label">Senha</label>
          <input name="senha" type="password" class="form-control">
          @error('senha') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <button class="btn btn-primary">Entrar</button>
      </form>
    </div>
  </div>
@endsection
