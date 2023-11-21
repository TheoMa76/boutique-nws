<?php
use Theo\Repository\UsersRepository;

require_once "./templates/includes/layoutGeneral.inc.php";
require_once "./templates/includes/adminmenu.inc.php";
require_once "./src/crud/crud.php";
require_once "./configs/dbConnect.php";
require_once "./src/Repository/UsersRepository.php";

include "./templates/users/new.php";

$redirectNeeded = false;

if (isset($_POST['action']) && $_POST['action'] === 'delete') {
    $id = $_POST['id'];
    delete($user, $id);
    $redirectNeeded = true;
}

$repository = new UsersRepository();
$users = $repository->findAll();
?>

<title>Liste Utilisateurs</title>

<div class="container mt-5">
    <h1>Liste des Utilisateurs</h1>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createUserModal">
        Créer un utilisateur
    </button>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Rôle</th>
                <th>Date de création</th>
                <th>Date de modification</th>
                <th>Dernière connexion</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            <?php
            for ($i = 0; $i < count($users); $i++) {
                echo "<tr>";
                echo "<td>" . $users[$i]->getId() . "</td>";
                echo "<td>" . $users[$i]->getEmail() . "</td>";
                echo "<td>" . $users[$i]->getRole() . "</td>";
                echo "<td>" . $users[$i]->getCreatedAt() . "</td>";
                echo "<td>" . $users[$i]->getUpdatedAt() . "</td>";
                echo "<td>" . $users[$i]->getLastLogin() . "</td>";
                
                // Boutons d'action
                echo "<td>";

                echo "<a class='btn btn-primary edit-button' href='./?page=admin&sous-page=user&action=edit&id=" . $users[$i]->getId() . "'>Editer</a>";
                echo "<form method='post' action=''>";
                echo "<input type='hidden' name='action' value='delete'>";
                echo "<input type='hidden' name='id' value='" . $users[$i]->getId() . "'>";
                echo "<button type='submit' name='submit' class='btn btn-danger' onclick=\"return confirm('Voulez-vous vraiment supprimer cet utilisateur ?')\">Supprimer</button>";
                echo "</form>";
                echo "</td>";
                
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php


if ($redirectNeeded) {
    echo '<script>window.location.href = "index.php?page=admin&sous-page=user";</script>';
    exit();
}
?>