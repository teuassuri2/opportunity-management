<?php
            namespace App\Http\Controllers;

use App\Http\Requests\StoreOpportunitysRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateVendedorRequest; 
use App\Http\Resources\OpportunitysJsonResource;
use App\Http\Resources\OpportunitysResource;use App\Models\Opportunitys;
use App\Models\Vendedor; 
use App\Services\OpportunitysService;
class OpportunitysController extends Controller { 
private OpportunitysService $opportunitysService; 
public function __construct(OpportunitysService $opportunitysService) {$this->opportunitysService = $opportunitysService; 
}
public function indexApi(Request $request) {
if ($request->isMethod("post")) {$opportunitys = $this->opportunitysService->findAll();
return response()->json(new OpportunitysResource($opportunitys), 200);
}
}
public function index() {
$opportunitys = $this->opportunitysService->findAll();
return view('opportunitys.index', ['opportunitys' => $opportunitys ]);}
public function storeApi(StoreOpportunitysRequest $request) {if ($request->isMethod("post")) {$opportunitys = $this->opportunitysService->store($request->validated());return response()->json(new OpportunitysJsonResource($opportunitys), 200);}
}
public function editApi(Opportunitys$opportunitys ,StoreOpportunitysRequest $request) {if ($request->isMethod("post")) {$opportunitys = $this->opportunitysService->update($opportunitys,$request->validated());return response()->json(new OpportunitysJsonResource($opportunitys), 200);}
}
public function store(StoreOpportunitysRequest $request) {if ($request->isMethod("post")) {$opportunitys = $this->opportunitysService->store($request->validated());}
return view('opportunitys.add');}
public function edit(Opportunitys$opportunitys ,StoreOpportunitysRequest $request) {if ($request->isMethod("post")) {$opportunitys = $this->opportunitysService->update($opportunitys,$request->validated());}
return view('opportunitys.edit', ['dados' => $opportunitys ]);}
public function deleteApi(int $id) {if ($request->isMethod("post")) {$this->opportunitysService->delete($id);
return response()->json((true), 200);
}
}
public function delete(int $id) {$this->opportunitysService->delete($id);
return redirect('/index');
}
}
