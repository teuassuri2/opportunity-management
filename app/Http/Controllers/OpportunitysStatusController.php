<?php
            namespace App\Http\Controllers;

use App\Http\Requests\StoreOpportunitysStatusRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateVendedorRequest; 
use App\Http\Resources\OpportunitysStatusJsonResource;
use App\Http\Resources\OpportunitysStatusResource;use App\Models\OpportunitysStatus;
use App\Models\Vendedor; 
use App\Services\OpportunitysStatusService;
class OpportunitysStatusController extends Controller { 
private OpportunitysStatusService $opportunitysStatusService; 
public function __construct(OpportunitysStatusService $opportunitysStatusService) {$this->opportunitysStatusService = $opportunitysStatusService; 
}
public function indexApi(Request $request) {
if ($request->isMethod("post")) {$opportunitysStatus = $this->opportunitysStatusService->findAll();
return response()->json(new OpportunitysStatusResource($opportunitysStatus), 200);
}
}
public function index() {
$opportunitysStatus = $this->opportunitysStatusService->findAll();
return view('opportunitys_status.index', ['opportunitys_status' => $opportunitysStatus ]);}
public function storeApi(StoreOpportunitysStatusRequest $request) {if ($request->isMethod("post")) {$opportunitysStatus = $this->opportunitysStatusService->store($request->validated());return response()->json(new OpportunitysStatusJsonResource($opportunitysStatus), 200);}
}
public function editApi(OpportunitysStatus$opportunitysStatus ,StoreOpportunitysStatusRequest $request) {if ($request->isMethod("post")) {$opportunitysStatus = $this->opportunitysStatusService->update($opportunitysStatus,$request->validated());return response()->json(new OpportunitysStatusJsonResource($opportunitysStatus), 200);}
}
public function store(StoreOpportunitysStatusRequest $request) {if ($request->isMethod("post")) {$opportunitysStatus = $this->opportunitysStatusService->store($request->validated());}
return view('opportunitys_status.add');}
public function edit(OpportunitysStatus$opportunitysStatus ,StoreOpportunitysStatusRequest $request) {if ($request->isMethod("post")) {$opportunitysStatus = $this->opportunitysStatusService->update($opportunitysStatus,$request->validated());}
return view('opportunitys_status.edit', ['dados' => $opportunitysStatus ]);}
public function deleteApi(int $id) {if ($request->isMethod("post")) {$this->opportunitysStatusService->delete($id);
return response()->json((true), 200);
}
}
public function delete(int $id) {$this->opportunitysStatusService->delete($id);
return redirect('/index');
}
}
