<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductsRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateVendedorRequest;
use App\Http\Resources\ProductsJsonResource;
use App\Http\Resources\ProductsResource;
use App\Models\Products;
use App\Models\Vendedor;
use App\Services\ProductsService;

class ProductsController extends Controller {

    private ProductsService $productsService;

    public function __construct(ProductsService $productsService) {
        $this->productsService = $productsService;
    }

    

}
