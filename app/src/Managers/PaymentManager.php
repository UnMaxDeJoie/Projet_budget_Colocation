<?php

namespace App\Managers;

use App\Entities\User;
use App\Entities\Payment;
use App\Factories\MySQLFactory;
use App\Managers\BaseManager;
use Generator;

class PaymentManagerManager extends BaseManager
{

    public function getCreatePayment(Payment $payment ): void
    {
        $query = $this->pdo->query("INSERT INTO payment (id_paument, prix, date, description, user_id) VALUES (:id_payment, :prix, :date, :description, :user_id)");
        $query->bindValue(":id_payment", $payment->getId_Payment(),\PDO::PARAM_INT);
        $query->bindValue(":prix", $payment->getPrix(),\PDO::PARAM_INT);
        $query->bindValue(":date", $payment->getDateTime());
        $query->bindValue(":description", $payment->getDescription(),\PDO::PARAM_STR);
        $query->bindValue(":user_id", $payment->getId_User(),\PDO::PARAM_INT);
        $query->execute();
    }

    public function getUpdatePayment(Payment $payment){
        $query = $this->pdo->prepare("UPDATE payment SET prix = :prix, date = :date, description = :description WHERE id_payment = :id_payment");
        $query->bindValue("prix", $payment->getPrix(), \PDO::PARAM_INT);
        $query->bindValue("date", $payment->getDateTime());
        $query->bindValue("description", $payment->getDescription(),\PDO::PARAM_STR);
        $query->execute();
    }

    public function getDeletePayment(int $id_payment){
        $query = $this->pdo->prepare("DELETE FROM payment WHERE id_payment = :id_payment");
        $query->bindValue("id_payment", $id_payment, \PDO::PARAM_INT);
        $query->execute();
    }

    public function getPaymentsById(int $id_user){
        $query = $this->pdo->prepare("SELECT * FROM payment WHERE id_user = :id_user");
        $query->bindValue("id_user",$id_user,\PDO::PARAM_INT);
        $query->execute();
    }

    public function getPaymentByGroup(id $id_group){
        $query = $this->pdo->prepare("SELECT * FROM payment WHERE id_group = :id_group");
        $query->bindValue("id_group", $id_group, \PDO::PARAM_INT);
        $query->execute();
    }
}


