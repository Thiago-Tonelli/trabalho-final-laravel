<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CategoriaController extends Controller
{
    public function __construct()
    {
        // proteger rotas com middleware
        $this->middleware('auth.simple')->except(['index', 'show']);
    }

    public function index()
    {
        $categorias = Categoria::orderBy('nome')->paginate(10);
        return view('categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:100',
            'descricao' => 'nullable|string',
        ]);

        Categoria::create($data);

        return redirect()->route('categorias.index')->with('success', 'Categoria criada.');
    }

    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    public function update(Request $request, Categoria $categoria)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:100',
            'descricao' => 'nullable|string',
        ]);

        $categoria->update($data);

        return redirect()->route('categorias.index')->with('success', 'Categoria atualizada.');
    }

    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect()->route('categorias.index')->with('success', 'Categoria removida.');
    }

    // opcional: rota pública para ver uma categoria e setar cookie da última categoria
    public function show(Categoria $categoria)
    {
        // gravar cookie com id da categoria por 30 dias
        Cookie::queue('ultima_categoria', $categoria->id, 60*24*30);
        return view('categorias.show', compact('categoria'));
    }
}
