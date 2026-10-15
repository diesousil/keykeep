<?php

namespace App\Repositories\Access;

use App\Models\Access\User;

class UserRepository extends Repository
{
    public function __construct(
        User $model
    ) {
        parent::__construct($model);
    }
}
