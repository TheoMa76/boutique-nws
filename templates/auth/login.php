<?php
require_once "./configs/dbConnect.php";
require_once "./templates/includes/layoutGeneral.inc.php";


use Theo\Entity\Users;
use Theo\Controller\Database;

session_start();
if(isset($_POST['email']) && isset($_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])) {
  $conn = new PdoManagerClass();
  $password = $_POST['password'];
  $email = $_POST['email'];
  $clean_email = htmlspecialchars($email);
  $clean_password = htmlspecialchars($password);

  $userData = $conn->getRelation(["users"], "email='$clean_email'", "", ["password"]);

  if (!empty($userData) && password_verify($clean_password, $userData[0]['password'])) {
    $_SESSION['user_email'] = $clean_email;
    if(isset($_SESSION['user_email'])){
      $user_email = $_SESSION['user_email'];
      echo "L'utilisateur connecté est : " . $user_email;
    } else {
      echo "Aucun utilisateur connecté";
    }
  } else {
    echo "Identifiants invalides. Veuillez réessayer.";
  }
} else {
  echo "Veuillez remplir tous les champs.";
}
?>

<div class="container mt-5">
    <div class="card" style="width: 400px; margin: 0 auto;">
        <div class="card-body">
            <h2 class="card-title text-center">Connexion</h2>
            <form action="" method="post">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="form-group text-center">
                    <input type="submit" class="btn btn-primary" value="Se connecter">
                </div>
            </form>
        </div>
    </div>
</div>
