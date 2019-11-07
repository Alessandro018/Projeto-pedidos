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
            return redirect()->route('meus_produtos')->with('success','Produto cadastrado com sucesso');
        }
        return redirect()->route('login');
    }

    public function meus_produtos()
    {
        if(auth()->check())
        {
            $produtos = Produtos::where('user_id', auth()->user()->id)->simplePaginate(6);
            return view('produtos.user', ['produtos' => $produtos]);
        }
    }

    public function edit($id)
    {
        if(auth()->check())
        {
            $produto = Produtos::find($id);
            return view('produtos.edit', ['produto'=> $produto]);
        }
    }

    public function update(Request $request, $id)
    {
        if(auth()->check())
        {
            $produto = Produtos::find($id);
            $request->validate([
                'nome' => 'required|min:4|max:60',
                'quantidade' => 'required|min:0|max:5000|numeric',
                'descricao' => 'required|max:255',
                'user_id' => 'required|numeric',
            ]);
            $produto->update($request->all());
            return redirect()->route('meus_produtos')->with('success', 'Produto atualizado com sucesso');
        }
    }

    public function destroy($id)
    {
        if(auth()->check())
        {
            Produtos::find($id)->delete();
            return redirect()->route('meus_produtos')
                ->with('success','Produto deletado com successo');
        }
        return redirect()->route('login');
    }
}
