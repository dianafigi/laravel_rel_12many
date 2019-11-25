<?php

use App\Produto;
use App\Categoria;

Route::get('/categorias', function () {
    $cat = Categoria::all();
    if (count($cat) === 0) {
      echo "<h4>Não existe nenhuma categoria</h4>";
    }
    else {
      foreach ($cat as $c) {
        echo "<p>" . $c->id . " - " . $c->nome . "</p>";
      }
    }
});

Route::get('/produtos', function () {
  $prod = Produto::all();
  if (count($prod) === 0) {
    echo "<h4>Não existe nenhuma produto</h4>";
  }
  else {
    echo "<table>";
    echo "<thead><tr><td>Nome</td><td>Stock</td><td>Preço</td><td>Categoria</td></tr></thead>";
    foreach ($prod as $p) {
      echo "<tr>";
      echo "<td>" . $p->nome . "</td>";
      echo "<td>" . $p->stock . "</td>";
      echo "<td>" . $p->preco . "</td>";
      echo "<td>" . $p->categoria->nome . "</td>";
      echo "</tr>";
    }
    echo "</table>";
  }
});


Route::get('/categoriasprodutos', function () {
  $cat = Categoria::all();
  if (count($cat) === 0) {
    echo "<h4>Não existe nenhuma categoria</h4>";
  }
  else {
    foreach ($cat as $c) {
      echo "<p>" . $c->id . " - " . $c->nome . "</p>";
      $produtos = $c->produtos;

      if(count($produtos) > 0) {
        echo "<ul>";
        foreach ($produtos as $p) {
          echo "<li>" . $p->nome . "</li>";
        }
        echo "</ul>";
      } else {
        echo "<h4>Não existe nenhum produto</h4>";
      }
    }
  }
});

Route::get('/categoriasprodutos/json', function() {
  $cats = Categoria::with('produtos')->get();
  return $cats->toJson();
});

//associar uma categoria a um produto
Route::get('/adicionarproduto', function() {
  $cat = Categoria::find(1);
  $prod = new Produto();
  $prod->nome = "Novo Prod";
  $prod->stock = 10;
  $prod->preco = 100;
  $prod->categoria()->associate($cat);
  $prod->save();
  return $prod->toJson();
});

//desassociar uma categoria a um produto
Route::get('/removerprodutocategoria', function() {
  $p = Produto::find(10);
  if (isset($p)) {
    $p->categoria()->dissociate();
    $p->save();
    return $p->toJson();
  }
  return '';
});

//outro metodo de associar
Route::get('/adicionarproduto/{cat}', function($catid) {
  $cat = Categoria::with('produtos')->find($catid);

  $prod = new Produto();
  $prod->nome = "Novo prod Adicionado 2";
  $prod->stock = 40;
  $prod->preco = 500;

  if (isset($cat)) {
    $cat->produtos()->save($prod);
  }
  $cat->load('produtos');  //actualizar os produtos, pq na altura em q foi chamado tinha apenas x numero de produtos mas agora tem x + o produto adicionado. Sem a actualizaçao ele mostra a lista de produtos previa.
  return $cat->toJson();
});