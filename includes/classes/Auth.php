<?php

namespace Includes\Classes;

use Includes\Dtos\LoginUserDTO;
use Includes\Entities\UserEntity;
use Includes\Enums\RolesEnum;

class Auth {

    private DB $db;

    public function __construct() {
        $this->db = new DB;
    }

    public function login(LoginUserDTO $dto): void
    {
        $user = $this->db->query(
            "SELECT *
            FROM users 
            WHERE email = :email OR user_name = :user_name 
            LIMIT 1",
            [
                ':email' => $dto->getUsernameOrEmail(),
                ':user_name' => $dto->getUsernameOrEmail(),
            ]
        );

        if (!$user) {
            Response::send(
                [
                    'message' => 'Credenciales inválidas'
                ],
                401
            );
        }

        $user = $user[0];

        if (!password_verify($dto->getPassword(), $user['hash'])) {
            Response::send(
                [
                    'message' => 'Credenciales inválidas'
                ],
                401
            );
        }
        
        $_SESSION['user'] = new UserEntity(
                                $user['id'],
                                $user['first_name'],
                                $user['last_name'],
                                $user['user_name'],
                                $user['email'],
                                RolesEnum::from($user['role_id'])
                            );
    }

    public function logout(): void
    {
        session_destroy();
    }

    public static function isLogged(): bool
    {
        return isset($_SESSION['user']);
    }

    public static function isAdmin(): bool
    {
        if (!isset($_SESSION['user'])) {
            return false;
        }

        return $_SESSION['user']->getUserRole() === RolesEnum::ADMIN_USER;
    }

    public static function getUser(): UserEntity
    {
        return $_SESSION['user'];
    }
}
