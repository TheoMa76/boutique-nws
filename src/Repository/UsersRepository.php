<?php
namespace Theo\Repository;

use Theo\Entity\Users;

require_once "./configs/dbConnect.php";
require_once "./src/crud/crud.php";
require_once "./src/Entity/Users.php";

class UsersRepository {
    function findAll(){

    $result = read("users");
        for ($i = 0; $i < count($result); $i++) {
        $users[] = new Users ($result[$i]['password'],$result[$i]['email'] ,$result[$i]['role']);
        $users[$i]->setCreatedAt($result[$i]['createdAt']);
        $users[$i]->setId($result[$i]['id']);
        $users[$i]->setLastLogin($result[$i]['lastLogin']);
        $users[$i]->setUpdatedAt($result[$i]['updatedAt']);
        }
        return $users;
    }

    function findById($id){
       $result = read("users");
       dd($result);
    }
}