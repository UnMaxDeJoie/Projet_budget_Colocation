<?php

namespace App\Managers;

use App\Entities\GroupColoc;
use App\Entities\Payment;
use App\Entities\User;
use App\Factories\MySQLFactory;
use App\Managers\BaseManager;
use App\Managers\PaymentManager;
use Generator;

class GroupColocManager extends BaseManager
{

    public function getCreateGroup(GroupColoc $groupcoloc): void
    {
        $query = $this->pdo->query("INSERT INTO group_coloc (id_group_coloc, name, payment_id, user_admin) VALUES (:id_group_coloc, :name, :payment_id, :user_admin )");
        $query->bindValue(":id_group_coloc", $groupcoloc->getid_GroupColoc(), \PDO::PARAM_STR);
        $query->bindValue(":user_admin", $groupcoloc->getuserAdmin(), \PDO::PARAM_STR);
        $query->bindValue(":name", $groupcoloc->getname(), \PDO::PARAM_STR);
        $query->bindValue(":payment_id", $groupcoloc->getpaymentId(), \PDO::PARAM_STR);
        $query->execute();
    }

    public function DeleteGroupColoc(int $idG)
    {
        $query = $this->pdo->prepare("DELETE FROM group_coloc WHERE id_group_coloc = :id_group_coloc");
        $query->bindValue(":id_group_coloc", $idG, \PDO::PARAM_INT);
        $query->execute();
    }
    public function AddUserInGroup(int $id_user, int $id_group)
    {
        $query = $this->pdo->prepare("INSERT INTO group_user (id_user, id_group) VALUES (:id_user, :id_group)");
        $query->bindValue(":id_user", $id_user,\PDO::PARAM_INT);
        $query->bindValue(":id_group", $id_group, \PDO::PARAM_INT);
        $query->execute();
    }
    public function DeleteUserInGroup(int $id_user, int $id_group)
    {
        $query = $this->pdo->prepare("DELETE FROM group_user WHERE id_user = :id_user");
        $query->execute();
    }

    public function getGroupById(int $id_user){
        $query = $this->pdo->prepare("SELECT id_group, name FROM group_user, group_coloc WHERE group_user(id_group)=group_coloc(id_group_coloc) AND id_user = :id_user");
        $query->bindValue("id_user", $id_user, \PDO::PARAM_INT);
        $query->execute();
    }

}