<?php

require_once "./configs/dbConnect.php";
require_once "./src/crud/crud.php";
require_once "./src/outils/toolkit.php";
// require_once "./src/entity/Ordinateur.php";
require_once "./src/outils/htmlGen.php";
include "./templates/includes/menu.inc.php";
debugMode(true);

if(isset($_GET['page']) && $_GET['page'] === 'register') {
    include './templates/auth/register.php';
}

if(isset($_GET['page']) && $_GET['page'] === 'login') {
    include './templates/auth/login.php';
}

if(isset($_GET['page']) && $_GET['page'] === 'logout') {
    include './templates/auth/logout.php';
}

if(isset($_GET['page']) && $_GET['page'] === 'accueil') {
    include './templates/accueil/accueil.php';
}

if(isset($_GET['page']) && $_GET['page'] === 'admin') {
    include './templates/admin/admin.php';
}



//$result = $pdo->getRelation(["marque","model","avis"],["ordinateur","avis"],"ordinateur.id = ordinateur_id",["ordinateur.id = 15"]);
//$ordinateur = new Ordinateur("DAUBE","BELLE DAUBE", "0","0","0","999999999");
//update($ordinateur,10);
//$result = $pdo->findAll('ordinateur');
$html = new htmlGen();

//$html->display(['ordinateur','avis'],'relation',"ordinateur.id = 15","ordinateur.id = ordinateur_id",["marque","model","avis"]);
//dd($result);