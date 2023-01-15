<?php

namespace App\Entities;

use App\Entities\BaseEntity;
use DateTime;
use http\QueryString;


class Payment extends BaseEntity
{
    public int $Id_Payment;
    public string $Prix;
    public User $Id_User;
    public string $Description;
    private DateTime $dateTime;


    // Getters
    public function getId_Payment(): int
    {
        return $this->Id_Payment;
    }

    public function getPrix(): string
    {
        return $this->Prix;
    }

    public function getDescription(): string
    {
        return $this->Description;
    }

    public function getId_User(): User
    {
        return $this->Id_User;
    }

    public function getDateTime(DateTime|null|string $dateTime): self
    {
        if ($dateTime instanceof DateTime || $dateTime === null) {
            $this->dateTime = $dateTime;
        } else {
            $this->dateTime= new DateTime($dateTime);
        }
        return $this;
    }


    // Setters
    public function setId_Payment(int $Id_Payment): void
    {
        $this->Id_Payment = $Id_Payment;
    }

    public function setDate(DateTime|string|null $dateTime): void
    {
        $this->dateTime = $dateTime;
    }

    public function setPrix(string $Prix): void
    {
        $this->Prix = $Prix;
    }

    public function setDescription(string $Description): void
    {
        $this->Description = $Description;
    }

    public function setId_User(User $Id_User): void
    {
        $this->Id_User = $Id_User;
    }

    public function addPayment(Payment $Payment): void
    {
        $this->Payment[$Payment->getId_Payment()] = $Payment;
    }

    public function removePayment(Payment $Payment): void
    {
        if (!array_key_exists($this->getId_Payment(), $this->Payment)) {
            return;
        }
        unset($this->Payment[$Payment->getId_Payment()]);
    }
}