<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // marca primeira visita na sessão
        if (!$request->session()->has('visitou')) {
            $request->session()->put('visitou', true);
            $mensagem = 'Bem-vindo (primeira visita)!';
        } else {
            $mensagem = 'Bem-vindo de volta!';
        }

        return view('home', ['mensagem' => $mensagem]);
    }
}
