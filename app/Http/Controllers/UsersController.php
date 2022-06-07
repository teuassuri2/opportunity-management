<?php
            namespace App\Http\Controllers;

use App\Http\Requests\StoreUsersRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateVendedorRequest; 
use App\Http\Resources\UsersJsonResource;
use App\Http\Resources\UsersResource;use App\Models\Users;
use App\Models\Vendedor; 
use App\Services\UsersService;
class UsersController extends Controller { 
private UsersService $usersService; 
public function __construct(UsersService $usersService) {$this->usersService = $usersService; 
}
public function indexApi(Request $request) {
if ($request->isMethod("post")) {$users = $this->usersService->findAll();
return response()->json(new UsersResource($users), 200);
}
}
public function index() {
$users = $this->usersService->findAll();
return view('users.index', ['users' => $users ]);}
public function storeApi(StoreUsersRequest $request) {if ($request->isMethod("post")) {$users = $this->usersService->store($request->validated());return response()->json(new UsersJsonResource($users), 200);}
}
public function editApi(Users$users ,StoreUsersRequest $request) {if ($request->isMethod("post")) {$users = $this->usersService->update($users,$request->validated());return response()->json(new UsersJsonResource($users), 200);}
}
public function store(StoreUsersRequest $request) {if ($request->isMethod("post")) {$users = $this->usersService->store($request->validated());}
return view('users.add');}
public function edit(Users$users ,StoreUsersRequest $request) {if ($request->isMethod("post")) {$users = $this->usersService->update($users,$request->validated());}
return view('users.edit', ['dados' => $users ]);}
public function deleteApi(int $id) {if ($request->isMethod("post")) {$this->usersService->delete($id);
return response()->json((true), 200);
}
}
public function delete(int $id) {$this->usersService->delete($id);
return redirect('/index');
}
}
