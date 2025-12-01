<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function auth(Request $request)
    {
        $data = $request->validate([
            'usuario' => 'required|string',
            'senha' => 'required|string'
        ]);

        $adminUser = env('ADMIN_USER', 'admin');
        $adminPass = env('ADMIN_PASS', '123456');

        if ($data['usuario'] === $adminUser && $data['senha'] === $adminPass) {
            $request->session()->put('usuario_logado', $data['usuario']);
            return redirect()->route('home')->with('success', 'Login realizado com sucesso.');
        }

        return back()->withErrors(['usuario' => 'Credenciais inválidas.'])->withInput();
    }

    public function logout(Request $request)
    {
        $request->session()->forget('usuario_logado');
        return redirect()->route('login.index')->with('success', 'Desconectado.');
    }
}
