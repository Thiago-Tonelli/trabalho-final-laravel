<?php

namespace App\Http\Controllers;

use App\Models\Hamburguer;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HamburguerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.simple')->except(['index', 'show']);
    }

    public function index()
    {
        $hamburgueres = Hamburguer::with('categoria')->orderBy('nome')->paginate(12);
        return view('hamburgueres.index', compact('hamburgueres'));
    }

    public function create()
    {
        $categorias = Categoria::orderBy('nome')->get();
        return view('hamburgueres.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:150',
            'descricao' => 'nullable|string',
            'preco' => 'required|numeric|min:0',
            'categoria_id' => 'required|exists:categorias,id',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('imagem')) {
            $data['imagem'] = $request->file('imagem')->store('hamburgueres', 'public');
        }

        Hamburguer::create($data);

        return redirect()->route('hamburgueres.index')->with('success', 'Hambúrguer criado.');
    }

    public function edit(Hamburguer $hamburguer)
    {
        $categorias = Categoria::orderBy('nome')->get();
        return view('hamburgueres.edit', compact('hamburguer', 'categorias'));
    }

    public function update(Request $request, Hamburguer $hamburguer)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:150',
            'descricao' => 'nullable|string',
            'preco' => 'required|numeric|min:0',
            'categoria_id' => 'required|exists:categorias,id',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('imagem')) {
            // remover imagem anterior se existir
            if ($hamburguer->imagem && Storage::disk('public')->exists($hamburguer->imagem)) {
                Storage::disk('public')->delete($hamburguer->imagem);
            }
            $data['imagem'] = $request->file('imagem')->store('hamburgueres', 'public');
        }

        $hamburguer->update($data);

        return redirect()->route('hamburgueres.index')->with('success', 'Hambúrguer atualizado.');
    }

    public function destroy(Hamburguer $hamburguer)
    {
        // remover imagem associada
        if ($hamburguer->imagem && Storage::disk('public')->exists($hamburguer->imagem)) {
            Storage::disk('public')->delete($hamburguer->imagem);
        }
        $hamburguer->delete();
        return redirect()->route('hamburgueres.index')->with('success', 'Hambúrguer removido.');
    }

    public function show(Hamburguer $hamburguer)
    {
        return view('hamburgueres.show', compact('hamburguer'));
    }
}
