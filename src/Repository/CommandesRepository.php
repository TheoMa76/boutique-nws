<?php
namespace Theo\Repository;

use Theo\Entity\Commandes;

require_once "./configs/dbConnect.php";
require_once "./src/crud/crud.php";
require_once "./src/Entity/Commandes.php";

class CommandesRepository {
    function findAll(){

    $result = read("commandes");
    if(!empty($result)){
        for ($i = 0; $i < count($result); $i++) {
            $commandes[] = new Commandes($result[$i]['nom'],$result[$i]['adresse'] ,$result[$i]['telephone'],$result[$i]['envoye']);
            $commandes[$i]->setId($result[$i]['id']);
        }
        return $commandes;
    }
}

    function findById($id){
        $result = read("commandes");
        if(!empty($result)){
            $commande = new Commandes($result[0]['nom'],$result[0]['adresse'] ,$result[0]['telephone'],$result[0]['envoye']);
            $commande->setId($result[0]['id']);
            return $commande;
        }
    }
}