<?php

namespace App\Repositories\Credential;

use App\Models\Credential\Tag;

class TagRepository extends Repository
{
    public function __construct(
        Tag $model
    ) {
        parent::__construct($model);
    }
}
