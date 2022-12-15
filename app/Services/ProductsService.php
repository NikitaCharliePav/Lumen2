<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Pagination\Paginator;

class ProductsService
{
    /**
     * @param int $limit
     * @return Paginator
     */
    public function getProducts(int $limit = 20)
    {
        return Product::paginate($limit);
    }
}
