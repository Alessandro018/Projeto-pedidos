@extends('layouts.app')

@section('content')
<h2 class="text-center">Minhas solicitações</h2><br>
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
                <th scope="col">Quantidade</th>
                <th scope="col">Data</th>
            </tr>
        </thead>
        <tbody>
            @foreach($solicitacoes as $solicitacao)
                <tr>
                    <td>{{ $solicitacao->produto->nome }}</td>
                    <td>{{ $solicitacao->produto->descricao }}</td>
                    <td>{{ $solicitacao->quantidade }}</td>
                    <td>{{ $solicitacao->created_at }}</td>
                    <td>
                        <form action="{{ action('SolicitacoesController@destroy',$solicitacao->id) }}" id="delete"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirm_{{ $solicitacao->id }}">Excluir</button>

                            <div class="modal fade" id="confirm_{{ $solicitacao->id }}" role="dialog">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-body" style="">
                                            Tem certeza que deseja excluir a solicitação?
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

@endsection