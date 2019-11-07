@extends('layouts.app')

@section('content')
    <h2 class="text-center">Lista de produtos</h2><br>
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
                        <button type="button" @click="max= {{ $produto->quantidade }}" data-toggle="modal" data-target="#confirm_{{ $produto->id }}"
                            class="btn btn-primary">Fazer pedido</button>
                        <form action="{{ action('SolicitacoesController@create', auth()->user()->id, $produto->id) }}" id="create"
                         method="PUT">
                            <div class="modal fade" id="confirm_{{ $produto->id }}" role="dialog">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            Fazer pedido
                                        </div><br>
                                        <div class="text-center">
                                            <p>Produto: {{ $produto->nome }}</p>
                                            <p>Disponível: {{ $produto->quantidade }}<p>
                                            Quantidade:
                                            <input type="number" name="quantidade" :value="quantidade" :max="max" min="1">
                                        </div>
                                        <div class="modal-footer" style="border:none">
                                            <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                                            <input type="hidden" name="produto_id" value="{{$produto->id}}">
                                            <input type="hidden" name="responsavel_produto" value="{{$produto->user_id}}">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal" class="btn btn-default">Cancelar</button>
                                            <button type="submit" class="btn btn-primary" v-if="max >=1">Solicitar</button>
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