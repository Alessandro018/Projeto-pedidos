<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    protected $table = 'produtos';

    protected $fillable = [
        'nome',
        'quantidade',
        'descricao',
        'user_id'
    ];

    public function solicitacoes()
    {
        return $this->hasMany('App\Solicitacoes', 'produto_id', 'id');
    }
}
