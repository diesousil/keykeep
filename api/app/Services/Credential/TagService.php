<?php

namespace App\Services\Credential;

use App\Services\Service;
use App\Repositories\Credential\TagRepository;

class TagService extends Service
{
    public function __construct(
        TagRepository $repository
    ) {
        parent::__construct($repository);
    }
}
