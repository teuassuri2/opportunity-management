<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOpportunitysStatusRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateVendedorRequest;
use App\Http\Resources\OpportunitysStatusJsonResource;
use App\Http\Resources\OpportunitysStatusResource;
use App\Models\OpportunitysStatus;
use App\Models\Vendedor;
use App\Services\OpportunitysStatusService;

class OpportunitysStatusController extends Controller {

    private OpportunitysStatusService $opportunitysStatusService;

    public function __construct(OpportunitysStatusService $opportunitysStatusService) {
        $this->opportunitysStatusService = $opportunitysStatusService;
    }


}
