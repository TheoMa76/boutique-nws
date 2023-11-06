<?php
use Theo\Entity\Users;
use Theo\Controller\Database;

if(isset($_POST['username']) && isset($_POST['password']) && !empty($_POST['username']) && !empty($_POST['password'])) {
    // Vous pouvez ajouter ici la logique de vérification du nom d'utilisateur et du mot de passe
    // Par exemple, une vérification dans une base de données
    get($user);
    // Exemple simple d'affichage des données de connexion
    $username = $_POST['username'];
    $password = $_POST['password'];

    echo "Nom d'utilisateur: $username <br>";
    echo "Mot de passe: $password";
} else {
    echo "Veuillez remplir tous les champs.";
}
?>


?>

<h2>Connexion</h2>

<form action="login.php" method="post">
  <div>
    <label for="username">Nom d'utilisateur:</label>
    <input type="text" id="username" name="username" required>
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