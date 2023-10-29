<?php

require_once "./configs/dbConnect.php";
// require_once "./src/crud/crud.php";
require_once "./src/outils/toolkit.php";
// require_once "./src/entity/Ordinateur.php";
require_once "./src/outils/htmlGen.php";

debugMode(true);
//$result = $pdo->getRelation(["marque","model","avis"],["ordinateur","avis"],"ordinateur.id = ordinateur_id",["ordinateur.id = 15"]);
//$ordinateur = new Ordinateur("DAUBE","BELLE DAUBE", "0","0","0","999999999");
//update($ordinateur,10);
//$result = $pdo->findAll('ordinateur');
$html = new htmlGen();
$html->display(['ordinateur','avis'],'relation',"ordinateur.id = 15","ordinateur.id = ordinateur_id",["marque","model","avis"]);
//dd($result);