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

if(isset($_GET['page']) && $_GET['page'] === 'newproduits') {
    include './templates/produits/newProduits.php';
}

//NE MARCHE PAS ! VOIR PLUSIEURS PARAM ( facile a corriger)

// if (isset($_GET['page']) && $_GET['page'] === 'admin' && isset($_GET['page']) && $_GET['page'] === 'produit') {
//     include './templates/produits/listProduits.php';
// }

// if (isset($_GET['page']) && $_GET['page'] === 'admin' && isset($_GET['page']) && $_GET['page'] === 'user') {
//     include './templates/users/listUsers.php';
// }

