<?php
require_once "./configs/dbConnect.php";

use Theo\Entity\Users;
use Theo\Controller\Database;

session_start();
if(isset($_POST['email']) && isset($_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])) {
  dd("coucou");
  $conn = new PdoManagerClass();
  $password = $_POST['password'];
  $email = $_POST['email'];
  $hashedPassword = password_hash($password, PASSWORD_ARGON2ID);
    $userData = $conn->getRelation(["users"], "email='$email'", "", ["password"]);
    dd($userData);

    if (!empty($userData) && password_verify($password, $userData[0]['password'])) {
      $_SESSION['user_email'] = $email;
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

<h2>Connexion</h2>

<form action="" method="post">
  <div>
    <label for="email">Email:</label>
    <input type="text" id="email" name="email" required>
  </div>
  <div>
    <label for="password">Mot de passe:</label>
    <input type="password" id="password" name="password" required>
  </div>
  <div>
    <input type="submit" value="Se connecter">
  </div>
</form>

</body>
</html>