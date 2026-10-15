<?php

namespace App\Repositories\Access;

use App\Repositories\Repository;
use App\Models\Access\User;

class UserRepository extends Repository
{
    public function __construct(
        User $model
    ) {
        parent::__construct($model);
    }

    public function getByEmail(string $email): User
    {
        return $this->model->where("email", $email)->first();
    }
}
