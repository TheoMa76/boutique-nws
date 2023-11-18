<?php
namespace Theo\Repository;

use Theo\Entity\Produits;

require_once "./configs/dbConnect.php";
require_once "./src/crud/crud.php";
require_once "./src/Entity/Produits.php";

class ProduitsRepository {
    function findAll(){

    $result = read("produits");
    if(!empty($result)){
        for ($i = 0; $i < count($result); $i++) {
            $produits[] = new Produits($result[$i]['nom'],$result[$i]['shortDesc'] ,$result[$i]['description'],$result[$i]['prix'],$result[$i]['quantite'],$result[$i]['enAvant']);
            $produits[$i]->setId($result[$i]['id']);
        }
        return $produits;
    }
}

    function findById($id){
        $result = read("produits");
        $produit = new Produits($result[0]['nom'],$result[0]['shortDesc'] ,$result[0]['description'],$result[0]['prix'],$result[0]['quantite'],$result[0]['enAvant']);
        $produit->setId($result[0]['id']);
        return $produit;
    }
}