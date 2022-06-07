<?php
            namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomersRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateVendedorRequest; 
use App\Http\Resources\CustomersJsonResource;
use App\Http\Resources\CustomersResource;use App\Models\Customers;
use App\Models\Vendedor; 
use App\Services\CustomersService;
class CustomersController extends Controller { 
private CustomersService $customersService; 
public function __construct(CustomersService $customersService) {$this->customersService = $customersService; 
}
public function indexApi(Request $request) {
if ($request->isMethod("post")) {$customers = $this->customersService->findAll();
return response()->json(new CustomersResource($customers), 200);
}
}
public function index() {
$customers = $this->customersService->findAll();
return view('customers.index', ['customers' => $customers ]);}
public function storeApi(StoreCustomersRequest $request) {if ($request->isMethod("post")) {$customers = $this->customersService->store($request->validated());return response()->json(new CustomersJsonResource($customers), 200);}
}
public function editApi(Customers$customers ,StoreCustomersRequest $request) {if ($request->isMethod("post")) {$customers = $this->customersService->update($customers,$request->validated());return response()->json(new CustomersJsonResource($customers), 200);}
}
public function store(StoreCustomersRequest $request) {if ($request->isMethod("post")) {$customers = $this->customersService->store($request->validated());}
return view('customers.add');}
public function edit(Customers$customers ,StoreCustomersRequest $request) {if ($request->isMethod("post")) {$customers = $this->customersService->update($customers,$request->validated());}
return view('customers.edit', ['dados' => $customers ]);}
public function deleteApi(int $id) {if ($request->isMethod("post")) {$this->customersService->delete($id);
return response()->json((true), 200);
}
}
public function delete(int $id) {$this->customersService->delete($id);
return redirect('/index');
}
}
