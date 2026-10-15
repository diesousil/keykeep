<?php

namespace App\Http\Controllers\Credential;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tag\CreateRequest;
use App\Http\Requests\Tag\EditRequest;
use App\Services\Credential\TagService;

class TagController extends Controller
{
    public function create(
        CreateRequest $request,
        TagService $service
    ) {
        return $this->success($service->create($request->validated()));
    }

    public function edit(
        EditRequest $request,
        int|string $id,
        TagService $service
    ) {
        return $this->success($service->edit($request->validated(), $id));
    }

    public function delete(
        int|string $id,
        TagService $service
    ) {
        return $this->success($service->delete($id));
    }

    public function show(
        int|string $id,
        TagService $service
    ) {
        return $this->success($service->getById($id));
    }

    public function list(
        TagService $service
    ) {
        return $this->success($service->list(request()->query()));
    }

    public function search(
        string $searchTerms,
        TagService $service
    ) {
        return $this->success($service->search($searchTerms, request()->query()));
    }
}
