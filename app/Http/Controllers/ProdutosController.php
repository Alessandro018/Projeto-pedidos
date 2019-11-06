<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produtos;

class ProdutosController extends Controller
{
    public function index()
    {
        if(auth()->check())
        {
            $produtos = Produtos::where('user_id', '!=', auth()->user()->id)->simplePaginate(6);
            return view('produtos.index', ['produtos' => $produtos]);
        }
        return redirect()->route('login');
    }
    public function create()
    {
        if(auth()->check())
        {
            return view('produtos.create');
        }
        return redirect()->route('login');
    }

    public function store(Request $request)
    {
        if(auth()->check())
        {
            $request->validate([
                'nome' => 'required|min:4|max:60',
                'quantidade' => 'required|min:0|max:5000|numeric',
                'descricao' => 'required|max:255',
                'user_id' => 'required|numeric',
            ]);
            Produtos::create($request->all());
            return redirect()->route('produtos.index')->with('success','Produto cadastrado com sucesso');
        }
    }

    public function meus_produtos()
    {
        if(auth()->check())
        {
            return view('produtos.user');
        }
    }
}
