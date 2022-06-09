<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTypesUsersRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateVendedorRequest;
use App\Http\Resources\TypesUsersJsonResource;
use App\Http\Resources\TypesUsersResource;
use App\Models\TypesUsers;
use App\Models\Vendedor;
use App\Services\TypesUsersService;

class TypesUsersController extends Controller {

    private TypesUsersService $typesUsersService;

    public function __construct(TypesUsersService $typesUsersService) {
        $this->typesUsersService = $typesUsersService;
    }

    

}
