<?php
require_once "./configs/dbConnect.php";
require_once "./src/crud/crud.php";
require_once "./src/outils/toolkit.php";
// require_once "./src/entity/Ordinateur.php";
require_once "./src/outils/htmlGen.php";
include "./templates/includes/menu.inc.php";
require_once "./src/Entity/Users.php";

use Theo\Entity\Users;

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
    $user = unserialize(serialize($_SESSION['user']));
    if(session_status() == PHP_SESSION_ACTIVE && isset($_SESSION['user']) && $user->getRole() === 'admin'){
        include './templates/admin/admin.php';
}else {
        include './templates/error/404.php';
        exit();
    }
}