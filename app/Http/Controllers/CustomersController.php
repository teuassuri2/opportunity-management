<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomersRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateVendedorRequest;
use App\Http\Resources\CustomersJsonResource;
use App\Http\Resources\CustomersResource;
use App\Models\Customers;
use App\Models\Vendedor;
use App\Services\CustomersService;

class CustomersController extends Controller {

    private CustomersService $customersService;

    public function __construct(CustomersService $customersService) {
        $this->customersService = $customersService;
    }

}
