<?php

namespace App\Services;

use Illuminate\Auth\AuthenticationException;
use App\Services\Service;
use App\Models\User;

class UserService extends Service
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function login(array $data): array
    {
        $token = auth("api")->claims([])->attempt(
            [
                'email' => $data['email'],
                'password' => $data['password'],
            ]
        );

        if (!$token) {
            throw new AuthenticationException('Invalid username and/or password.');
        }

        $expiration = $this->getExpiration();

        return [
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => $expiration . ' hours',
        ];
    }
}
