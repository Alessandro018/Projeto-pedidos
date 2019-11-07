@extends('layouts.app')

@section('content')
    <h2 class="text-center">Minhas solicitações</h2><br>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <form  action="{{ action('ProdutosController@update', $produto->id) }}" method="POST" style="width:80%; margin:auto">
        @csrf
        @method('PUT')
        <h2>Atualizar produto</h2><br>
        <div class="form-group">
            <div class="row">
                <div class="col-sm">
                    <label>Nome</label>
                    <input type="text" class="form-control" name="nome" placeholder="Nome do produto" 
                    minlength="4" maxlength="60" value="{{ $produto->nome }}" required >
                </div>
                <div class="col-sm">
                    <label>Quantidade</label>
                    <input type="number" class="form-control" name="quantidade" value="{{ $produto->quantidade }}" min="0" max="5000"
                        required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Descrição</label>
            <textarea class="form-control" rows="3" name="descricao" maxlength="255" required >{{ $produto->descricao }}</textarea>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
    </form>

@endsection