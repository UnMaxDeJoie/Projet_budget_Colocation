<?php

namespace App\Managers;

use App\Entities\User;
use App\Helper\PasswordHelper;
use Generator;


class UserManagers extends BaseManager
{
    /**
     * @return ?Generator
     */

    public function getUsers(): ?Generator
    {
        
        $query = $this->pdo->query("SELECT * FROM user");

        while($data = $query->fetch(\PDO::FETCH_ASSOC)){
            yield new User($data);
        }

    }


    public function getUser(int $id_User)
    {
        $query = $this->pdo->prepare("SELECT * FROM user WHERE id_user = :id_user");
        $query->bindValue("id_user", $id_User, \PDO::PARAM_INT);
        $query->execute();
        $data = $query->fetch(\PDO::FETCH_ASSOC);

        if ($data) {
            return new User($data);
        }

        return null;
    }

    public function getUsername(string $username): ?User
    {
        $query = $this->pdo->prepare("SELECT username, pw_hash, id_user FROM user WHERE username = :username");
        $query->bindValue("username", $username, \PDO::PARAM_STR);
        $query->execute();
        $data = $query->fetch(\PDO::FETCH_ASSOC);
        if ($data) {
            return new User($data);
        }

        return null;
    }

    public function createUser(User $user)
    {
        $query = $this->pdo->prepare("INSERT INTO user (username, mail, pw_hash) VALUES (:username, :mail, :pw_hash)");
        $pwHelper = new PasswordHelper();
        $pwHash = $pwHelper->hashPassword($user->getPwHash());
        $query->execute([
            ":username" => $user->getUsername(),
            ":mail" => $user->getMail(),
            ":pw_hash" => $pwHash
        ]);

    }

    public function updateUser($user)
    {
        $query = $this->pdo->prepare("UPDATE user SET username = :username, email = :mail, pw_hash = :pw_hash WHERE id_user = :id_user");
        $query->bindValue("pw_hash", $user->getPwHash(), \PDO::PARAM_STR);
        $query->bindValue("username", $user->getUsername(), \PDO::PARAM_STR);
        $query->bindValue("mail",$user->getMail(), \PDO::PARAM_STR);
        $query->execute();
    }

    public function deleteUser($id_user)
    {
        $query = $this->pdo->prepare("DELETE FROM user WHERE id_user = :id_user");
        $query->bindValue("id_User", $id_user, \PDO::PARAM_INT);
        $query->execute();
    }

    public function login($id, $password)
    {
        $query = $this->pdo->prepare("SELECT id_user FROM user WHERE email = :email AND pw_hash = :pw_hash");
        $query->execute();
    }

    public function Register(User $user)
    {
        $query = $this->pdo->prepare("INSERT INTO user (password, username) VALUES (:password, :username)");
        $query->bindValue("password", $user->getPwHash(), \PDO::PARAM_STR);
        $query->bindValue("username", $user->getUsername(), \PDO::PARAM_STR);
        $query->execute();
    }
}