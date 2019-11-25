<?php

use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('Produtos')->insert([
        'nome' => 'Camisa', 'preco' => 100, 'stock' => 4, 'categoria_id' => 1
        ]);
      DB::table('Produtos')->insert([
        'nome' => 'Jeans', 'preco' => 120, 'stock' => 1, 'categoria_id' => 1
        ]);
      DB::table('Produtos')->insert([
        'nome' => 'Top', 'preco' => 50, 'stock' => 9, 'categoria_id' => 1
        ]);
      DB::table('Produtos')->insert([
        'nome' => 'PC Games', 'preco' => 60, 'stock' => 5, 'categoria_id' => 2
        ]);
      DB::table('Produtos')->insert([
        'nome' => 'Teclado', 'preco' => 300, 'stock' => 2, 'categoria_id' => 6
        ]);
      DB::table('Produtos')->insert([
        'nome' => 'Rato', 'preco' => 30, 'stock' => 3, 'categoria_id' => 6
        ]);
      DB::table('Produtos')->insert([
        'nome' => 'Perfume', 'preco' => 55, 'stock' => 3, 'categoria_id' => 3
        ]);
      DB::table('Produtos')->insert([
        'nome' => 'Cama', 'preco' => 500, 'stock' => 1, 'categoria_id' => 4
        ]);
      DB::table('Produtos')->insert([
        'nome' => 'Móvel', 'preco' => 500, 'stock' => 8, 'categoria_id' => 4
        ]);
    }
}
