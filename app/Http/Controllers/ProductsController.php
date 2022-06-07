<?php
            namespace App\Http\Controllers;

use App\Http\Requests\StoreProductsRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateVendedorRequest; 
use App\Http\Resources\ProductsJsonResource;
use App\Http\Resources\ProductsResource;use App\Models\Products;
use App\Models\Vendedor; 
use App\Services\ProductsService;
class ProductsController extends Controller { 
private ProductsService $productsService; 
public function __construct(ProductsService $productsService) {$this->productsService = $productsService; 
}
public function indexApi(Request $request) {
if ($request->isMethod("post")) {$products = $this->productsService->findAll();
return response()->json(new ProductsResource($products), 200);
}
}
public function index() {
$products = $this->productsService->findAll();
return view('products.index', ['products' => $products ]);}
public function storeApi(StoreProductsRequest $request) {if ($request->isMethod("post")) {$products = $this->productsService->store($request->validated());return response()->json(new ProductsJsonResource($products), 200);}
}
public function editApi(Products$products ,StoreProductsRequest $request) {if ($request->isMethod("post")) {$products = $this->productsService->update($products,$request->validated());return response()->json(new ProductsJsonResource($products), 200);}
}
public function store(StoreProductsRequest $request) {if ($request->isMethod("post")) {$products = $this->productsService->store($request->validated());}
return view('products.add');}
public function edit(Products$products ,StoreProductsRequest $request) {if ($request->isMethod("post")) {$products = $this->productsService->update($products,$request->validated());}
return view('products.edit', ['dados' => $products ]);}
public function deleteApi(int $id) {if ($request->isMethod("post")) {$this->productsService->delete($id);
return response()->json((true), 200);
}
}
public function delete(int $id) {$this->productsService->delete($id);
return redirect('/index');
}
}
