<?php

namespace App\Services\Access;

use App\Services\ServiceValidator;
use App\Repositories\Access\UserRepository;

class UserServiceValidator extends ServiceValidator
{
    public function __construct(
        UserRepository $repository
    ) {
        parent::__construct($repository);
    }

    public function validateLogin(array $data): void
    {
        $errorMessages = [];
        $user = $this->repository->getByEmail($data["email"]);

        if (!$user->email_verified_at) {
            $errorMessages[] = ["verification" => "User not verified"];
        }

        $this->throwErrors($errorMessages);
    }

    public function validateCreate(array $data): void
    {

    }

    public function validateEdit(array $data, int|string $id): void
    {

    }

    public function validateDelete(int|string $id): void
    {

    }
}
