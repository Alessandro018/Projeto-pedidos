@extends('layouts.app')

@section('content')

    <h2 class="text-center">Meus produtos</h2><br>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif
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
                    <td>
                        <a class="btn btn-primary" href="{{ action('ProdutosController@edit',$produto->id) }}">Editar</a>
                    </td>
                    <td>
                        <form action="{{ action('ProdutosController@destroy',$produto->id) }}" id="delete"
                         method="POST">
                            @csrf
				            @method('DELETE')
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirm_{{ $produto->id }}">Excluir</button>

                            <div class="modal fade" id="confirm_{{ $produto->id }}" role="dialog">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-body" style="">
                                            Tem certeza que deseja excluir o produto?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal" class="btn btn-default">Cancelar</button>
                                            <button type="submit" class="btn btn-danger">Excluir</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </td>
                </tr>
            @endforeach    
        </tbody>
    </table>
    {{ $produtos->links() }}

@endsection