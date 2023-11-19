<?php

require_once "./templates/includes/layoutGeneral.inc.php";
require_once "./src/crud/crud.php";
require_once "./configs/dbConnect.php";
require_once "./src/Repository/CommandesRepository.php";

use Theo\Entity\Commandes;

?>

<h1>Formulaire de Paiement</h1>

<div class="container">
        <h1 class="mt-5">Formulaire de Paiement</h1>

        <form method="post" action="">
            <div class="mb-3">
                <label for="nom" class="form-label">Nom :</label>
                <input type="text" id="nom" name="nom" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="adresse" class="form-label">Adresse :</label>
                <input type="text" id="adresse" name="adresse" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="telephone" class="form-label">Téléphone :</label>
                <input type="text" id="telephone" name="telephone" class="form-control" required>
            </div>

            <input type="hidden" name="action" value="finaliser">
            <button type="submit" class="btn btn-primary">Payer</button>
        </form>
    </div>


<?php

if (isset($_POST['action']) && $_POST['action'] === 'finaliser') {
    $nom = $_POST['nom'];
    $adresse = $_POST['adresse'];
    $telephone = $_POST['telephone'];

    $commande = new Commandes($nom, $adresse, $telephone, 0);

    create($commande);
    //$query = $db->prepare("INSERT INTO commandes_produit (commande_id, produit_id) VALUES (:nom, :adresse, :telephone, :prixTotal)");


    //echo '<script>window.location.href = "index.php?page=merci";</script>';
    //exit();
} 
?>
