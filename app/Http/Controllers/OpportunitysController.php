<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOpportunitysRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateVendedorRequest;
use App\Http\Resources\OpportunitysJsonResource;
use App\Http\Resources\OpportunitysResource;
use App\Models\Opportunitys;
use App\Models\Vendedor;
use App\Services\OpportunitysService;
use \App\Services\CustomersService;
use \App\Services\ProductsService;
use \App\Services\UsersService;

class OpportunitysController extends Controller {

    private OpportunitysService $opportunitysService;
    private CustomersService $customersService;
    private ProductsService $productsService;
    private UsersService $usersService;
    
    public function __construct(OpportunitysService $opportunitysService) {
        $this->opportunitysService = $opportunitysService;
    }

    public function indexApi(Request $request, String $search) {
        if ($request->isMethod("post")) {
            $opportunitys = $this->opportunitysService->findAll($search);
            return response()->json(new OpportunitysResource($opportunitys), 200);
        }
    }

    public function index(Request $request, UsersService $usersService) {
        $opportunitys = $this->opportunitysService->findAll($request);
        $this->usersService = $usersService;
        
        return view('opportunitys.index', ['opportunitys' => $opportunitys, 'users' => $this->usersService->findAll()]);
    }

    public function store(Request $request, CustomersService $customersService, ProductsService $productsService) { 
        
        $this->customersService = $customersService;
        $this->productsService = $productsService;
        return view('opportunitys.store', [
            'customers' => $this->customersService->findAll(),
            'products' => $this->productsService->findAll()
        ]);
    }
    
    public function storeCreate(StoreOpportunitysRequest $request) { 
        if ($request->isMethod("post")) {
           return $this->opportunitysService->store($request->validated());
        }
    }
    
    public function storeApi(StoreOpportunitysRequest $request) {
        if ($request->isMethod("post")) {
            $opportunitys = $this->opportunitysService->store($request->validated());
            return response()->json(new OpportunitysJsonResource($opportunitys), 200);
        }
    }
    

    public function update(Opportunitys $opportunitys) {
        return view('opportunitys.update', ['opportunitys' => $opportunitys]);
    }
    
    
     public function updateStatus(Opportunitys $opportunitys, Request $request) {
        return $this->opportunitysService->updateStatus($opportunitys, $request);
    }
    

    public function acceptOrReject(Opportunitys $opportunitys, $option , Request $request) {
            return $this->opportunitysService->updateAcceptOrReject($opportunitys, $option);
    }


}
