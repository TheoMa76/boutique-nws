<?php
require_once "./templates/includes/layoutGeneral.inc.php";
require_once "./templates/includes/adminmenu.inc.php";
require_once "./src/crud/crud.php";
require_once './vendor/autoload.php';


use Theo\Entity\Users;
$userID = $_GET['id'];

$repository = new UsersRepository();
$user = $repository->findById($userID);

if(isset($_POST['editUserBtn'])) {

    $email = $_POST['email'];
    $role = $_POST['role'];

    date_default_timezone_set('Europe/Paris');
    $date = new DateTime();
    $dateFormatted = $date->format('Y-m-d H:i:s');

    $user = new Users("", $email, $role);

    $user->setUpdatedAt($dateFormatted);
    $id = $user->getId();
    udpate($user, $id);
}
?>

<div class="modal fade" id="createUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createUserModalLabel">Editer un utilisateur</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
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
                    <button type="submit" class="btn btn-primary" name="editUserBtn">Éditer</button>
                </div>
            </form>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>

