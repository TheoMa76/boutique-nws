<?php
require_once "./templates/includes/layoutGeneral.inc.php";
require_once "./templates/includes/adminmenu.inc.php";
require_once "./src/crud/crud.php";
require_once './vendor/autoload.php';


use Theo\Entity\Users;

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $email = $_POST['email'];
  $role = $_POST['role'];

  date_default_timezone_set('Europe/Paris');
  $date = new DateTime();
  $dateFormatted = $date->format('Y-m-d H:i:s');


  $user = new Users("",$email,$role);
  $user->setCreatedAt($dateFormatted);
  $user->setUpdatedAt($dateFormatted);
  $user->setLastLogin($dateFormatted);
  create($user);
}
?>

<div class="container mt-5">
    <div class="card" style="width: 400px; margin: 0 auto;">
        <div class="card-body">
            <h2 class="card-title text-center">Créer un utilisateur</h2>
            <form method="post" action="">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="role">Rôle:</label>
                    <input type="text" class="form-control" id="role" name="role" required>
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary">Créer</button>
                </div>
            </form>
        </div>
    </div>
</div>

