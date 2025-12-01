<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>BurgerMaster - @yield('title')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="@if(request()->cookie('tema') === 'dark') bg-dark text-light @endif">
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
  <div class="container">
    <a class="navbar-brand" href="{{ route('home') }}">🍔 BurgerMaster</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link" href="{{ route('hamburgueres.index') }}">Cardápio</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('categorias.index') }}">Categorias</a></li>
      </ul>
      <ul class="navbar-nav">
        @if(session('usuario_logado'))
          <li class="nav-item"><span class="nav-link">Olá, {{ session('usuario_logado') }}</span></li>
          <li class="nav-item">
            <form method="POST" action="{{ route('login.logout') }}">
              @csrf
              <button class="btn btn-sm btn-outline-secondary" type="submit">Sair</button>
            </form>
          </li>
        @else
          <li class="nav-item"><a class="nav-link" href="{{ route('login.index') }}">Login</a></li>
        @endif
      </ul>
    </div>
  </div>
</nav>

<div class="container">
  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif
  @if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
  @endif
  @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
