<?php

namespace Database\Seeders;

use App\Models\Product;
use \Illuminate\Database\Seeder;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class ProductsSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * Функция заполняющая таблицу products_table.
     * @return void
     */
    public function run()
    {
        if (empty(Product::first()))
        {
            for ($i = 0; $i < 100; $i++)
            {
                $this->createProduct();
            }
        }
    }

    /**
     * Функция создает продукты в таблице products_table.
     *
     * @return void
     */
    private function createProduct()
    {
        $brand = Arr::random([
            'Zara',
            'Bershka',
            'Ostin',
            'H&M',
            'Modis',
            'Terranova',
            'Springfild'
        ]);

        $kindProduct = Arr::random([
            't-shirt',
            'chemise',
            'dress ',
            'sweater',
            'sweatshirt',
            'shorts',
            'trousers',
            'skirt',
            'jeans',
            'coat',
            'jacket'
        ]);

        $colorProduct= Arr::random([
            'black',
            'white',
            'blue',
            'red',
            'grey'
        ]);

        $product = new Product();
        $product->id = Str::uuid();
        $product->name = $brand . '_' . $kindProduct . '_' . $colorProduct;
        $product->price = rand(1, 10) * 100;
        $product-> published_at = date('Y-m-d H:i:s');
        $product->save();
    }

}
