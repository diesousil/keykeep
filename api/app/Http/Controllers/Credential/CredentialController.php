<?php

namespace App\Http\Controllers\Credential;

use App\Http\Controllers\Controller;
use App\Http\Requests\Credential\CreateRequest;
use App\Http\Requests\Credential\EditRequest;
use App\Http\Requests\Credential\EditPasswordRequest;
use App\Http\Resources\Credential\CredentialResource;
use App\Services\Credential\CredentialService;

class CredentialController extends Controller
{
    protected function getResourceClass(): ?string
    {
        return CredentialResource::class;
    }

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
        return $this->success($service->list(request()->query()));
    }

    public function setPassword(
        int|string $id,
        EditPasswordRequest $request,
        CredentialService $service
    ) {
        return $this->success($service->setPassword($request->validated(), $id));
    }

    public function getPassword(
        int|string $id,
        CredentialService $service
    ) {
        return $this->success($service->getPassword($id));
    }

    public function search(
        string $searchTerms,
        CredentialService $service
    ) {
        return $this->success($service->search($searchTerms, request()->query()));
    }
}
