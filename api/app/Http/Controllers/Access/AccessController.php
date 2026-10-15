<?php

namespace App\Http\Controllers\Access;

use App\Http\Controllers\Controller;
use App\Http\Requests\Access\LoginRequest;
use App\Services\Access\UserService;

class AccessController extends Controller
{
    public function login(LoginRequest $request, UserService $service)
    {
        return $this->success($service->login($request->validated()));
    }
}
