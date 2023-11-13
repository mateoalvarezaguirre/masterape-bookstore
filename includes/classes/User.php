<?php

namespace Includes\Classes;

use Includes\Dtos\CreateUserDTO;
use Includes\Enums\RolesEnum;

class User {

    private DB $db;

    public function __construct() {
        $this->db = new DB;
    }

    public function create(CreateUserDTO $dto): bool
    {
        $this->validateEmail($dto->getEmail());

        $this->validateUserName($dto->getUserName());

        $sql = "INSERT INTO users (first_name, last_name, email, user_name, hash, role_id)
                VALUES (
                    :first_name, 
                    :last_name, 
                    :email, 
                    :user_name, 
                    :hash, 
                    :role_id
                )";

        $values = [
            ':first_name' => $dto->getFirstName(),
            ':last_name' => $dto->getLastName(),
            ':email' => $dto->getEmail(),
            ':user_name' => $dto->getUserName(),
            ':hash' => $dto->getHash(),
            ':role_id' => RolesEnum::REGULAR_USER->value,
        ];

        try {
            return $this->db->execute($sql, $values);
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function validateEmail(string $email): void
    {   
        if ($this->db->exist('users', 'email', $email)) {
            Response::send(
                [
                    'message' => 'Campos inválidos'
                ],
                409
            );
        }
    }

    public function validateUserName(string $userName) : void 
    {
        if ($this->db->exist('users', 'user_name', $userName)) {
            Response::send(
                [
                    'message' => 'Campos inválidos'
                ],
                409
            );
        }
    }
}