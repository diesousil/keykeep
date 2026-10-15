<?php

namespace App\Http\Controllers\Credential;

use App\Http\Controllers\Controller;
use App\Http\Requests\Credential\CreateRequest;
use App\Http\Requests\Credential\EditRequest;
use App\Services\Credential\CredentialService;

class CredentialController extends Controller
{
    public function create(
        CreateRequest $request,
        CredentialService $service
    ) {
        return $this->success($service->create($request->validated()));
    }

    public function edit(
        EditRequest $request,
        int|string $id,
        CredentialService $service
    ) {
        return $this->success($service->edit($request->validated(), $id));
    }

    public function delete(
        int|string $id,
        CredentialService $service
    ) {
        return $this->success($service->delete($id));
    }

    public function show(
        int|string $id,
        CredentialService $service
    ) {
        return $this->success($service->getById($id));
    }

    public function list(
        CredentialService $service
    ) {
        return $this->success($service->list());
    }
}
