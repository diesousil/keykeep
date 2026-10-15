<?php

namespace App\Services\Credential;

use App\Services\Service;
use App\Repositories\Credential\CredentialRepository;

class CredentialService extends Service
{
    public function __construct(
        CredentialRepository $repository
    ) {
        parent::__construct($repository);
    }
}
