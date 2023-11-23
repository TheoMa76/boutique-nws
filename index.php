<?php
require_once "./configs/dbConnect.php";
require_once "./src/crud/crud.php";
require_once "./src/outils/toolkit.php";
require_once "./src/outils/htmlGen.php";
include "./templates/includes/menu.inc.php";
require_once "./src/Entity/Users.php";

if(isset($_GET['page']) && $_GET['page'] === 'register') {
    include './templates/auth/register.php';
}

if(isset($_GET['page']) && $_GET['page'] === 'login') {
    include './templates/auth/login.php';
}

if(isset($_GET['page']) && $_GET['page'] === 'logout') {
    include './templates/auth/logout.php';
}

if(isset($_GET['page']) && $_GET['page'] === 'merci') {
    include './templates/commandes/merci.php';
}

if(isset($_GET['page']) && $_GET['page'] === 'accueil') {
    include './templates/accueil/accueil.php';
}

if(isset($_GET['page']) && $_GET['page'] === 'catalogue') {
    if(isset($_GET['sous-page']) && $_GET['sous-page'] === 'detail') {
        include './templates/catalogue/produit_details.php';
    } else {
        include './templates/catalogue/catalogue.php';
    }
}

if(isset($_GET['page']) && $_GET['page'] === 'panier') {
    if(isset($_SESSION['cart'])) {
        include './templates/moncompte/panier/panier.php';
    } else {
        include './templates/moncompte/panier/panier.php';
        echo "<div class='alert alert-danger'>Votre panier est vide.</div>";
    }
}

if(isset($_GET['page']) && $_GET['page'] === 'payer') {
    include './templates/commandes/formPayer.php';
}

if(!isset($_GET['page'])) {
    include './templates/accueil/accueil.php';
}

if(isset($_GET['page']) && $_GET['page'] === 'admin') {
    if(isset($_SESSION)){
        $user = unserialize(serialize($_SESSION['user']));
        if(session_status() == PHP_SESSION_ACTIVE && isset($_SESSION['user']) && $user->getRole() === 'admin'){
            include './templates/admin/admin.php';
        }
}else {
        include './templates/error/404.php';
        exit();
    }
}