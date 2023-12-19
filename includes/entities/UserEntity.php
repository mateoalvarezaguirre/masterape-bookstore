<?php

namespace Includes\Entities;

use Includes\Enums\RolesEnum;

class UserEntity {

    public function __construct(
        private readonly int $id,
        private readonly string $firstName,
        private readonly string $lastName,
        private readonly string $userName,
        private readonly string $email,
        private readonly RolesEnum $userRole
    ) {}

    public function getId(): int
    {
        return $this->id;
    }

    public function getFirstName() : string 
    {
        return $this->firstName;
    }

    public function getLastName() : string 
    {
        return $this->lastName;
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

    public function getFullName(): string
    {
        return $this->firstName . ' ' . $this->lastName;
    }
}