<?php
use Theo\Repository\UsersRepository;

require_once "./templates/includes/layoutGeneral.inc.php";
require_once "./templates/includes/adminmenu.inc.php";
require_once "./src/crud/crud.php";
require_once "./configs/dbConnect.php";
require_once "./src/Repository/UsersRepository.php";

$repository = new UsersRepository();
$result = $repository->findAll();

?>

<title>Page d'Administration</title>

<div class="container mt-5">
    <h1>Liste des Utilisateurs</h1>

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Rôle</th>
                <th>Date de création</th>
                <th>Date de modification</th>
                <th>Dernière connexion</th>
            </tr>
        </thead>

        <tbody>
            <?php
            for ($i = 0; $i < count($result); $i++) {
                echo "<tr>";
                echo "<td>" . $result[$i]->getId() . "</td>";
                echo "<td>" . $result[$i]->getEmail() . "</td>";
                echo "<td>" . $result[$i]->getRole() . "</td>";
                echo "<td>" . $result[$i]->getCreatedAt() . "</td>";
                echo "<td>" . $result[$i]->getUpdatedAt() . "</td>";
                echo "<td>" . $result[$i]->getLastLogin() . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
