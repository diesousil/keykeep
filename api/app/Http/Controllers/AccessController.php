<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Access\LoginRequest;
use App\Services\UserService;

class AccessController extends Controller
{
    public function login(LoginRequest $request, UserService $service)
    {
        return $this->success($service->login($request->validated()));
    }
}
