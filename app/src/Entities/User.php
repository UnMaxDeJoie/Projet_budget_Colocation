<?php

namespace App\Entities;
use App\Interfaces\IUser;
use App\Entities\BaseEntity;

class User extends BaseEntity implements IUser
{
    private int $Id_User;
    private string $Username;
    private string $Password;
    private string $Mail;
    private string $Firstname;
    private string $Lastname;
    private string $Pwhash;

    // Getters
    public function getId_User() : int { return $this->Id_User; }
    public function getUsername() : string { return $this->Username; }
    public function getPassword() : string { return $this->Password; }
    public function getMail() : string { return $this->Mail; }
    public function getPwHash() : string { return $this->Pwhash; }
    public function getFirstname() : string { return $this->Firstname; }
    public function getLastname() : string { return $this->Lastname; }

    // Setters
    public function setId_User(int $Id_User) : void { $this->Id_User = $Id_User; }
    public function setUsername(string $Username) : void { $this->Username = $Username; }
    public function setPassword(string $Password) : void { $this->Password = $Password; }
    public function setMail(string $Mail) : void { $this->Mail = $Mail; }
    public function setPwhash(string $Pwhash) : void { $this->Pwhash = $Pwhash; }
    public function setFirstname(string $Firstname) : void { $this->Firstname = $Firstname; }
    public function setLastname(string $Lastname) : void {$this->Lastname = $Lastname; }
}