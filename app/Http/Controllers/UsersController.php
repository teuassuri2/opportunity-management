<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUsersRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateVendedorRequest;
use App\Http\Resources\UsersJsonResource;
use App\Http\Resources\UsersResource;
use App\Models\User;
use App\Models\Vendedor;
use App\Services\UsersService;

class UsersController extends Controller {

    private UsersService $usersService;

    public function __construct(UsersService $usersService) {
        $this->usersService = $usersService;
    }


    public function auth(Request $request) {
        return view('users.login');
    }

    public function authLogin(StoreUsersRequest $request) {
        return $this->usersService->auth($request);
    }

    public function authLogout(Request $request) {
        
        return $this->usersService->logout($request);
    }

   

}
