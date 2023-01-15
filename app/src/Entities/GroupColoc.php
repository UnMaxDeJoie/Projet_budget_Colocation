<?php

namespace App\Entities;
use App\Entities\BaseEntity;

class GroupColoc extends BaseEntity
{
    public int $id_GroupColoc;
    public int $paymentId;
    public string $name;
    public string $role;

    // Getters
    public function getid_GroupColoc(): int { return $this->id_GroupColoc; }
    public function getname(): string { return $this->name; }
    public function getpaymentId(): string { return $this->paymentId; }
    public function getuserAdmin(): string { return $this->userAdmin;}



    // Setters
    public function setid_GroupColoc(int $id_GroupColoc): void { $this->id_GroupColoc = $id_GroupColoc; }
    public function setpaymentId(int $paymentId): void { $this->paymentId = $paymentId ; }
    public function setuserAdmin(int $userAdmin): void { $this->userAdmin = $userAdmin ;}
    public function setname(string $name): void { $this->name = $name ;}


}