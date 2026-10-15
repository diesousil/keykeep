<?php

namespace App\Services\Access;

use Illuminate\Auth\AuthenticationException;
use App\Services\Service;
use App\Services\Access\UserServiceValidator;
use App\Repositories\Access\UserRepository;

class UserService extends Service
{
    public function __construct(
        UserRepository $repository
    ) {
        parent::__construct($repository);
    }

    private function generateExpiration()
    {
        return ceil(config('jwt.ttl') / 60);
    }

    public function login(array $data): array
    {
        $this->validator->validateLogin($data);

        $token = auth("api")->claims([])->attempt(
            [
                'email' => $data['email'],
                'password' => $data['password'],
            ]
        );

        if (!$token) {
            throw new AuthenticationException('Invalid username and/or password.');
        }

        return [
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => $this->generateExpiration() . ' hours',
        ];
    }
}
