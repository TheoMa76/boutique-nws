<?php
require_once "./templates/includes/layoutGeneral.inc.php";
require_once "./src/crud/crud.php";
require_once './vendor/autoload.php';


use Theo\Entity\Users;

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $email = $_POST['email'];
  $password = $_POST['password'];
  $hashedPassword = password_hash($password, PASSWORD_ARGON2ID);
  $role = $_POST['role'];

  date_default_timezone_set('Europe/Paris');
  $date = new DateTime();
  $dateFormatted = $date->format('Y-m-d H:i:s');


  $user = new Users($hashedPassword,$email,$role);
  $user->setCreatedAt($dateFormatted);
  $user->setUpdatedAt($dateFormatted);
  $user->setLastLogin($dateFormatted);
  dd($user);
  create($user);
}
?>

<h2>Inscription</h2>

<form method="post" action="">
  <div>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
  </div>
  <div>
    <label for="password">Mot de passe:</label>
    <input type="password" id="password" name="password" required>
  </div>
  <div>
    <label for="role">Rôle:</label>
    <input type="text" id="role" name="role" required>
  </div>
  <button type="submit">S'inscrire</button>
</form>

</body>
</html>
