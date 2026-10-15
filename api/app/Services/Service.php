<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\ItemNotFoundException;
use App\Services\ServiceValidator;
use App\Repositories\Repository;
use App\Models\Model;

abstract class Service
{
    protected ?ServiceValidator $validator = null;

    public function __construct(
        protected Repository $repository
    ) {
        $this->setValidator();
    }

    protected function getValidatorClassName(): string
    {
        return static::class. 'Validator';
    }

    private function setValidator()
    {
        $validatorClassName = $this->getValidatorClassName();

        if (class_exists($validatorClassName)) {
            $this->validator = app()->makeWith(
                $validatorClassName,
                ['repository' => $this->repository],
            );
        }
    }

    public function create(array $data): Model
    {
        if ($this->validator) {
            $this->validator->validateCreate($data);
        }

        return $this->repository->create($data);
    }

    public function edit(array $data, string|int $id): Model
    {
        if ($this->validator) {
            $this->validator->validateEdit($data, $id);
        }

        return $this->repository->update($data, $id);
    }

    public function delete(string|int $id): bool
    {
        if ($this->validator) {
            $this->validator->validateDelete($id);
        }

        return $this->repository->delete($id);
    }

    public function list(array|null $data = null, bool $paginate = true): LengthAwarePaginator | Collection
    {
        return ($paginate ?
            $this->repository->listWithPagination($data) :
            $this->repository->list($data)
        );
    }

    public function getById(string|int $id): Model | null
    {
        return $this->repository->getById($id);
    }
}
