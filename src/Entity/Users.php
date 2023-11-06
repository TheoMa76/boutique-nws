<?php
namespace Theo\Entity;

class Users{
    private $id;
    protected $email;
    protected $password;
    protected $role;
    protected $createdAt;
    protected $updatedAt;
    protected $lastLogin;

    public function __construct($password,$email,$role){
        $this->password = $password;
        $this->email = $email;
        $this->role = $role;
    }
    public function getId(){
        return $this->id;
    }

    public function getPassword(){
        return $this->password;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getRole(){
        return $this->role;
    }
    public function getCreatedAt(){
        return $this->createdAt;
    }
    public function getUpdatedAt(){
        return $this->updatedAt;
    }

    public function getLastLogin(){
        return $this->lastLogin;
    }

    public function setId($id){
        $this->id = $id;
    }
    
    public function setPassword($password){
        $this->password = $password;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function setRole($role){
        $this->role = $role;
    }
    public function setCreatedAt($createdAt){
        $this->createdAt = $createdAt;
    }
    public function setUpdatedAt($updatedAt){
        $this->updatedAt = $updatedAt;
    }

    public function setLastLogin($lastLogin){
        $this->lastLogin = $lastLogin;
    }   
}