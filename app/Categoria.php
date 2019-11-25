<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
  public function produtos() {
    return $this->hasMany('App\Produto'); //é utilizado qd a tabela pai tem varios filhos, logo é de um para muitos. Pe, a categoria 1(electronicos) está associada a vários produtos (filhos), por isso nao se usa o hasOne() que é 1 para 1. Usa-se o hasMany().
  }
}
