<?php

namespace App\Repositories\Credential;

use App\Repositories\Repository;
use App\Models\Credential\Credential;
use Illuminate\Database\Eloquent\Builder;

class CredentialRepository extends Repository
{
    public function __construct(
        Credential $model
    ) {
        parent::__construct($model);
    }

    protected function getQuery(): Builder
    {
        return $this->model->where("user_id", auth()->user()->id);
    }
}
