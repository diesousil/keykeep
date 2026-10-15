<?php

namespace App\Http\Controllers\Credential;

use App\Http\Controllers\Controller;
use App\Http\Requests\Access\LoginRequest;
use App\Services\Access\UserService;

class CredentialController extends Controller
{
    public function login(LoginRequest $request, UserService $service)
    {
        return $this->success($service->login($request->validated()));
    }
}
