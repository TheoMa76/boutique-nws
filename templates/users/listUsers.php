<?php
use Theo\Repository\UsersRepository;

require_once "./templates/includes/layoutGeneral.inc.php";
require_once "./templates/includes/adminmenu.inc.php";
require_once "./src/crud/crud.php";
require_once "./configs/dbConnect.php";
require_once "./src/Repository/UsersRepository.php";

$repository = new UsersRepository();
$users = $repository->findAll();
?>

<title>Liste Utilisateurs</title>

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
                <th>Actions</th> <!-- Nouvelle colonne pour les actions -->
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
                echo "<a href='./?page=admin&sous-page=user&action=new' class='btn btn-success'>Créer</a> ";
                echo "<a href='./templates/users/edit.php?page=admin&sous-page=user&action=edit&id=" . $users[$i]->getId() . "' class='btn btn-primary'>Editer</a> ";
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
//TODO suppression
if (isset($_POST['action']) && $_POST['action'] === 'delete') {
    $id = $_POST['id'];
    delete($etudiant, $id);
    header('Location: index.php?page=accueil');
    exit();
}
?>