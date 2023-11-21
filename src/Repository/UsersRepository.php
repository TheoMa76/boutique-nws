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
        if(!empty($result)){
            for ($i = 0; $i < count($result); $i++) {
                if($result[$i]['id'] == $id){
                    $user = new Users($result[$i]['password'],$result[$i]['email'] ,$result[$i]['role']);
                    $user->setLastLogin($result[$i]['lastLogin']);
                    $user->setUpdatedAt($result[$i]['updatedAt']);
                    $user->setCreatedAt($result[$i]['createdAt']);
                    $user->setId($id);
                    return $user;
                }
            }
        }
    }
}