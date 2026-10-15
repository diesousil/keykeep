<?php

namespace App\Services\Credential;

use App\Services\Service;
use App\Support\Crypter;
use App\Models\Model;
use App\Repositories\Credential\CredentialRepository;

class CredentialService extends Service
{
    public function __construct(
        CredentialRepository $repository
    ) {
        parent::__construct($repository);
    }

    private function generateCkey()
    {
        return Crypter::generateKey();
    }

    private function encrypt(string $password, string $ckey): string
    {
        return (new Crypter($ckey))->encrypt($password);
    }

    private function setPassword(array &$data): void
    {
        $data["ckey"]     = $this->generateCkey();
        $data["password"] = $this->encrypt($data["password"], $data["ckey"]);
    }

    public function create(array $data): Model
    {
        $this->setPassword($data);

        return parent::create($data);
    }

    public function edit(array $data, string|int $id): Model
    {
        if (isset($data["password"])) {
            $this->setPassword($data);
        }

        return parent::edit($data, $id);
    }
}
