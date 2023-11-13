<?php

namespace Includes\Entities;

use Includes\Enums\RolesEnum;

class UserEntity {

    public function __construct(
        private readonly int $id,
        private readonly string $userName,
        private readonly string $email,
        private readonly RolesEnum $userRole
    ) {}

    public function getId(): int
    {
        return $this->id;
    }

    public function getUserName(): string
    {
        return $this->userName;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getUserRole(): RolesEnum
    {
        return $this->userRole;
    }
}