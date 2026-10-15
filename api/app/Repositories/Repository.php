<?php

namespace App\Repositories;

use App\Models\Model;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Builder;

class Repository
{
    public function __construct(
        protected Model $model
    ) {
    }

    protected function getQuery(): Builder
    {
        return $this->model::query();
    }

    public function store(array $data): Model
    {
        return $this->model->create($data);
    }

    public function batchStore(array $data): bool
    {
        return $this->model->insert($data);
    }

    public function update(array $data, int|string $id): Model
    {
        $dataObj = $this->getById($id);

        $dataObj->fill($data);
        $dataObj->save();

        return $dataObj;
    }

    public function destroy(int|string $id): void
    {
        $this->model->destroy($id);
    }

    public function getById(int|string $id): ?Model
    {
        return $this->getQuery()->find($id);
    }

    public function getAll(): Collection
    {
        return $this->getQuery()->get();
    }
}
