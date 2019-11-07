<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Solicitacoes;
use App\Produtos;
class SolicitacoesController extends Controller
{
    public function index()
    {
        if(auth()->check())
        {
            $solicitacoes = Solicitacoes::where('user_id', auth()->user()->id)->simplePaginate(6);
            return view('solicitacoes.index', ['solicitacoes' => $solicitacoes]);
        }
        return redirect()->route('login');
    }

    public function create(Request $request)
    {
        if(auth()->check())
        {
            Solicitacoes::create($request->all());
            $produto = Produtos::find($request->produto_id);
            $produto->quantidade -= $request->quantidade;
            if($produto->quantidade >=0)
            {
                $produto->update();
                return redirect()->route('solicitacoes.index')->with('success', 'Solicitação feita com sucesso');
            }
            return redirect()->back()->withErrors('Produto não disponível');
        }
        return redirect()->route('login');
    }

    public function destroy($id)
    {
        if(auth()->check())
        {
            $solicitacao = Solicitacoes::find($id)->delete();
            return redirect()->route('solicitacoes.index')
                ->with('success','Solicitação deletada com successo');
        }
        return redirect()->route('login');
    }
}
