<?php

use Illuminate\Database\Seeder;
use App\Models\Supermarket;
use App\Models\Product;

class SupermarketsProducts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Supermarket::select('*')->delete();
        Product::select('*')->delete();

        $supermarkets = [
            [
                'name' => 'Supermercado A'
            ],
            [
                'name' => 'Supermercado B'
            ],
            [
                'name' => 'Supermercado C'
            ],
            [
                'name' => 'Supermercado D'
            ],
        ];

        foreach ($supermarkets as $key => $value) {
            $products = [
                [ 'name' => 'Arroz parboilizado', 'price' => mt_rand( 0, 10000 ) / 100 ],
                [ 'name' => 'Arroz integral', 'price' => mt_rand( 0, 10000 ) / 100 ],
                [ 'name' => 'Arroz selvagem', 'price' => mt_rand( 0, 10000 ) / 100 ],
                [ 'name' => 'Arroz vermelho', 'price' => mt_rand( 0, 10000 ) / 100 ],

                [ 'name' => 'Feijão carioca', 'price' => mt_rand( 0, 10000 ) / 100 ],
                [ 'name' => 'Feijão fradinho', 'price' => mt_rand( 0, 10000 ) / 100 ],
                [ 'name' => 'Feijão jalo', 'price' => mt_rand( 0, 10000 ) / 100 ],
                [ 'name' => 'Feijão bolinha', 'price' => mt_rand( 0, 10000 ) / 100 ],
            ];

            $supermarket = Supermarket::create($value);
            $supermarket->products()->createMany($products);

            $products = collect($supermarket->products->pluck('id'))->random(4);

            $supermarket->products()->whereIn('id', $products)->delete();

        }

    }
}
