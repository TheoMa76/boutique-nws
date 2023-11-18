<?php
require_once "./templates/includes/layoutGeneral.inc.php";
require_once "./templates/includes/adminmenu.inc.php";
require_once "./src/crud/crud.php";
require_once './vendor/autoload.php';
require_once "./src/Repository/UsersRepository.php";

use Theo\Repository\UsersRepository;


use Theo\Entity\Users;

$userID = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : '';
$repository = new UsersRepository();
$user = $repository->findById($userID);

if(isset($_POST['editUserBtn'])) {

  $email = $_POST['email'];
  $role = $_POST['role'];

  date_default_timezone_set('Europe/Paris');
  $date = new DateTime();
  $dateFormatted = $date->format('Y-m-d H:i:s');

  $user->setUpdatedAt($dateFormatted);
  $user->setEmail($email);
  $user->setRole($role);
  update($user, $userID);
}
?>

<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editUserModalLabel">Modifier un utilisateur</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form method="post" action="">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $user->getEmail() ?>" required>
                </div>
                <div class="form-group">
                    <label for="role">Rôle:</label>
                    <input type="text" class="form-control" id="role" name="role" value="<?php echo $user->getRole() ?>" required>
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

