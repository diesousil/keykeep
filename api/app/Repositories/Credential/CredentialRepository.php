<?php

namespace App\Repositories\Credential;

use App\Models\Credential\Credential;

class CredentialRepository extends Repository
{
    public function __construct(
        Credential $model
    ) {
        parent::__construct($model);
    }
}
