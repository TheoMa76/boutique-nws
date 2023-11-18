<?php
use Theo\Repository\UsersRepository;

require_once "./templates/includes/layoutGeneral.inc.php";
require_once "./templates/includes/adminmenu.inc.php";
require_once "./src/crud/crud.php";
require_once "./configs/dbConnect.php";
require_once "./src/Repository/UsersRepository.php";

if (isset($_GET['page']) && $_GET['page'] === 'admin' && isset($_GET['sous-page']) && $_GET['sous-page'] === 'user') {
    if(isset($_GET['action']) && $_GET['action'] === 'new') {
         include './templates/users/new.php';
     }else{
        include './templates/users/listUsers.php';
     }
}

if (isset($_GET['page']) && $_GET['page'] === 'admin' && isset($_GET['sous-page']) && $_GET['sous-page'] === 'produit') {
    if(isset($_GET['action']) && $_GET['action'] === 'new') {
         include './templates/produits/new.php';
     }else{
        include './templates/produits/listProduits.php';
     }
}

if (isset($_GET['page']) && $_GET['page'] === 'admin' && isset($_GET['sous-page']) && $_GET['sous-page'] === 'commande') {
        include './templates/commandes/listCommandes.php';
}

?>

