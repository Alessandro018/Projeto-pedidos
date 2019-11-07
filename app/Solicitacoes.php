<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitacoes extends Model
{
    protected $table = 'solicitacoes';

    protected $fillable = [
        'user_id',
        'produto_id',
        'responsavel_produto',
        'quantidade',
    ];

    public function produto()
    {
        return $this->hasMany('App\Produtos', 'id', 'produto_id');
    }
}
