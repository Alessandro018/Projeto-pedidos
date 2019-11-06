@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
        </div>
    @endif
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif
    <h2 class="text-center">Lista de produtos</h2><br>
    <table class="table table-borderless">
        <thead>
            <tr>
                <th scope="col">Produto</th>
                <th scope="col">Descrição</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produtos as $produto)
                <tr>
                    <td>{{ $produto->nome }}</td>
                    <td>{{ $produto->descricao }}</td>
                    <td><a href="">Realizar pedido</a></td>
                </tr>
            @endforeach    
        </tbody>
    </table>
    {{ $produtos->links() }}

@endsection