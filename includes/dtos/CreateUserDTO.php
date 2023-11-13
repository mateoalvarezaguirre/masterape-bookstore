<?php

namespace Includes\Dtos;

use Includes\Classes\Response;

class CreateUserDTO {

    private string $hash;

    public function __construct(
        private readonly string $firstName,
        private readonly string $lastName,
        private readonly string $email,
        private readonly string $userName,
        private readonly string $password,
    ) {
        $this->validateFields();
        $this->hashPassword();
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getUserName(): string
    {
        return $this->userName;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getHash(): string
    {
        return $this->hash;
    }

    private function validateFields(): void
    {
        if (
            $this->firstName === '' || 
            $this->lastName === '' ||
            $this->email === '' ||
            $this->userName === '' ||
            $this->password === ''
        ) {
            $this->invalidFieldsResponse();
        }

        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $this->invalidFieldsResponse();
        }
    }

    private function hashPassword(): void
    {
        $this->hash = password_hash($this->password, PASSWORD_BCRYPT);
    }

    private function invalidFieldsResponse(): void
    {
        Response::send(
            [
                'message' => 'Campos inválidos'
            ],
            409
        );
    }
}