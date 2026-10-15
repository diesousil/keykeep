<?php

namespace App\Repositories\Credential;

use App\Models\Credential\Tag;
use App\Repositories\Repository;
use Illuminate\Database\Eloquent\Builder;

class TagRepository extends Repository
{
    public function __construct(
        Tag $model
    ) {
        parent::__construct($model);
    }

    protected function getQuery(): Builder
    {
        return $this->model->where("user_id", auth()->user()->id);
    }
}
