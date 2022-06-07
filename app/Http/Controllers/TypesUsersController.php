<?php
            namespace App\Http\Controllers;

use App\Http\Requests\StoreTypesUsersRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateVendedorRequest; 
use App\Http\Resources\TypesUsersJsonResource;
use App\Http\Resources\TypesUsersResource;use App\Models\TypesUsers;
use App\Models\Vendedor; 
use App\Services\TypesUsersService;
class TypesUsersController extends Controller { 
private TypesUsersService $typesUsersService; 
public function __construct(TypesUsersService $typesUsersService) {$this->typesUsersService = $typesUsersService; 
}
public function indexApi(Request $request) {
if ($request->isMethod("post")) {$typesUsers = $this->typesUsersService->findAll();
return response()->json(new TypesUsersResource($typesUsers), 200);
}
}
public function index() {
$typesUsers = $this->typesUsersService->findAll();
return view('types_users.index', ['types_users' => $typesUsers ]);}
public function storeApi(StoreTypesUsersRequest $request) {if ($request->isMethod("post")) {$typesUsers = $this->typesUsersService->store($request->validated());return response()->json(new TypesUsersJsonResource($typesUsers), 200);}
}
public function editApi(TypesUsers$typesUsers ,StoreTypesUsersRequest $request) {if ($request->isMethod("post")) {$typesUsers = $this->typesUsersService->update($typesUsers,$request->validated());return response()->json(new TypesUsersJsonResource($typesUsers), 200);}
}
public function store(StoreTypesUsersRequest $request) {if ($request->isMethod("post")) {$typesUsers = $this->typesUsersService->store($request->validated());}
return view('types_users.add');}
public function edit(TypesUsers$typesUsers ,StoreTypesUsersRequest $request) {if ($request->isMethod("post")) {$typesUsers = $this->typesUsersService->update($typesUsers,$request->validated());}
return view('types_users.edit', ['dados' => $typesUsers ]);}
public function deleteApi(int $id) {if ($request->isMethod("post")) {$this->typesUsersService->delete($id);
return response()->json((true), 200);
}
}
public function delete(int $id) {$this->typesUsersService->delete($id);
return redirect('/index');
}
}
