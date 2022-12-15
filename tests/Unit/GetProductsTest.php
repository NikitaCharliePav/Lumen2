<?php

namespace Test\Unit;

use App\Services\ProductsService;
use Illuminate\Pagination\LengthAwarePaginator;
use Tests\TestCase;

class GetProductsTest extends TestCase
{

    /**
     * Тестирует получение продуктов
     *
     * @return void
     */
    public function testGetProducts()
    {
        $limit = 5;
        $productService = new ProductsService();
        $products = $productService->getProducts($limit);
        $this->assertInstanceOf(LengthAwarePaginator::class,$products);
    }
}
