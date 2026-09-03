<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\ItemNotFoundException;
use Illuminate\Database\Query\Builder;

class Service
{
    public function __construct(
        protected Model $model
    ) {

    }

    protected function getQuery(): Builder
    {
        return $this->model->newQuery();
    }

    protected function paginate(Builder $query, array $data): LengthAwarePaginator
    {
        $pageSize = (isset($data['page_size']) ? intval($data['page_size']) :
                        (env('DEFAULT_LIST_PAGE_SIZE') != null ? env('DEFAULT_LIST_PAGE_SIZE') : 15));

        $page     = (isset($data['page']) ? intval($data['page']) : 1);

        return $query->paginate($pageSize, ['*'], 'page', $page);
    }

    private function sanitize_data(array $data): array
    {
        return array_filter($data, function ($item, $key) {
            return $item !== null;
        }, ARRAY_FILTER_USE_BOTH);
    }

    public function create(array $data): Model
    {
        return $this->model->create($this->sanitize_data($data));
    }

    public function edit(array $data, string|int $id): Model
    {
        $dataObj = $this->getById($id);
        $dataObj->fill($this->sanitize_data($data));
        $dataObj->save();

        return $dataObj;
    }

    public function delete(string|int $id): bool
    {
        return $this->getById($id)->delete();
    }

    public function getAll(bool $paginate = true): LengthAwarePaginator | Collection
    {
        $query = $this->getBaseQuery();

        $data = null;
        if ($paginate) {
            $data = $this->paginate($query, request()->all());
        } else {
            $data = $query->get();
        }

        return $data;
    }

    public function getById(string|int $id): Model
    {
        $dataObj = $this->getBaseQuery()->find($id);

        if (!$dataObj) {
            throw new ItemNotFoundException('Record not found.');
        }

        return $dataObj;
    }
}
