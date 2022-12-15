<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaginationRequest;
use App\Services\ProductsService;
use Illuminate\Http\Response;

class ProductsController extends Controller
{

    protected ProductsService $service;

    /**
     * @param ProductsService $productsService
     */
    public function __construct(ProductsService $productsService)
    {
        $this->service = $productsService;
    }

    /**
     * @param PaginationRequest $request
     * @return Response
     */
    public function getProducts(PaginationRequest $request): Response
    {
        $limit = $request->get('limit');
        $products = $this->service->getProducts($limit);

        return response($products);
    }

}
