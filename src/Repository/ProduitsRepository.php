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
            $produits[] = new Produits($result[$i]['nom'],$result[$i]['shortDesc'] ,$result[$i]['description'],$result[$i]['prix'],$result[$i]['quantite'],$result[$i]['enAvant'],$result[$i]['image']);
            $produits[$i]->setId($result[$i]['id']);
        }
        return $produits;
    }
}

    function findById($id){
        $result = read("produits");
        if(!empty($result)){
            for ($i = 0; $i < count($result); $i++) {
                if($result[$i]['id'] == $id){
                    $produit = new Produits($result[$i]['nom'],$result[$i]['shortDesc'] ,$result[$i]['description'],$result[$i]['prix'],$result[$i]['quantite'],$result[$i]['enAvant'],$result[$i]['image']);
                    $produit->setId($id);
                    return $produit;
                }
            }
        }
    }

    function findByEnAvant(){
        $result = read("produits");
        if(!empty($result)){
            for ($i = 0; $i < count($result); $i++) {
                if($result[$i]['enAvant'] == 1){
                    $produit = new Produits($result[$i]['nom'],$result[$i]['shortDesc'] ,$result[$i]['description'],$result[$i]['prix'],$result[$i]['quantite'],$result[$i]['enAvant'],$result[$i]['image']);
                    $produit->setId($result[$i]['id']);
                    $produits[] = $produit;
                }
            }
            return $produits;
        }
    }

}