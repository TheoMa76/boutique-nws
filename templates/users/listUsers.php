<?php
use Theo\Repository\UsersRepository;

require_once "./templates/includes/layoutGeneral.inc.php";
require_once "./templates/includes/adminmenu.inc.php";
require_once "./src/crud/crud.php";
require_once "./configs/dbConnect.php";
require_once "./src/Repository/UsersRepository.php";

include "./templates/users/new.php";
include "./templates/users/edit.php";

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
                
                // echo "<a href='./templates/users/edit.php?page=admin&sous-page=user&action=edit&id=" . $users[$i]->getId() . "' class='btn btn-primary'>Editer</a> ";
                echo "<button type='button' class='btn btn-primary edit-button' data-toggle='modal' data-target='#editUserModal' data-id='" . $users[$i]->getId() . "'>Editer</button>";
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
<script>
    function addUserIDToURL(userID) {
            var currentURL = window.location.href;
            var separator = currentURL.indexOf('?') !== -1 ? '&' : '?';
            var newURL = currentURL + separator + 'id=' + userID;
            window.history.pushState({ path: newURL }, '', newURL);
        }

    function removeUserIDFromURL() {
        var currentURL = window.location.href;
        var newURL = currentURL.replace(/[?&]id=\d+/g, '');
        console.log(newURL);
        window.history.replaceState({ path: newURL }, '', newURL);
    }
    document.addEventListener('DOMContentLoaded', function () {
        var editUserModal = document.getElementById('editUserModal');
        var editButtons = document.querySelectorAll('.edit-button');

        editButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                var userId = button.getAttribute('data-id');
                if (window.location.href.indexOf('id=') !== -1) {
                    removeUserIDFromURL();
                }
                addUserIDToURL(userId);

                $('#editUserModal').modal('show');
            });
        });
    });
</script>


<?php
//TODO suppression
if (isset($_POST['action']) && $_POST['action'] === 'delete') {
    $id = $_POST['id'];
    delete($user, $id);
}

if ($redirectNeeded) {
    echo '<script>window.location.href = "index.php?page=admin&sous-page=user";</script>';
    exit();
}
?>