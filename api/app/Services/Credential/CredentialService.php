<?php

namespace App\Services\Credential;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
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
        $this->setSearchFields(["description","title","url","username","observations"]);
    }

    public function setPassword(array $data, int|string $id = null): Model
    {
        $data["ckey"]     = Crypter::generateKey();
        $data["password"] = (new Crypter($data["ckey"]))->encrypt($data["password"]);

        return ($id == null ? parent::create($data) : parent::edit($data, $id));
    }

    public function getPassword(int|string $id): string
    {
        $credential = $this->repository->getById($id);

        if (!$credential) {
            throw new NotFoundHttpException("Record not found");
        }

        return (new Crypter($credential->ckey))->decrypt($credential->password);
    }

    public function create(array $data): Model
    {
        $newModel = $this->setPassword($data);
        $this->saveRelatedTags($data, $newModel->id);

        return $this->getById($newModel->id);
    }

    public function edit(array $data, string|int $id): Model
    {
        parent::edit($data, $id);
        $this->saveRelatedTags($data, $id);

        return $this->getById($id);
    }

    private function saveRelatedTags($data, $id)
    {
        if (isset($data["tags"])) {
            $this->repository->saveRelatedTags($data["tags"], $id);
        }
    }
}
