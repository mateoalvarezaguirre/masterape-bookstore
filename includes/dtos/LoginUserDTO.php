<?php

namespace Includes\Dtos;

class LoginUserDTO 
{
    public function __construct(
        private readonly string $usernameOrEmail,
        private readonly string $password
    ) {}

    public function getUsernameOrEmail(): string
    {
        return $this->usernameOrEmail;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}