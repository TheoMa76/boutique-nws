<?php
use Theo\Repository\UsersRepository;

require_once "./templates/includes/layoutGeneral.inc.php";
require_once "./templates/includes/adminmenu.inc.php";
require_once "./src/crud/crud.php";
require_once "./configs/dbConnect.php";
require_once "./src/Repository/ProduitsRepository.php";

include "./templates/produits/new.php";
include "./templates/produits/edit.php";

use Theo\Repository\ProduitsRepository;
use Theo\Entity\Produits;

$repository = new ProduitsRepository();
$produits = $repository->findAll();

$redirectNeeded = false;

if (isset($_POST['action']) && $_POST['action'] === 'delete') {
    $id = $_POST['id'];
    $produit = $repository->findById($id);
    delete($produit, $id);
    $redirectNeeded = true;
}


?>

<title>Liste des produits</title>

<div class="container mt-5">
    <h1>Liste des produits</h1>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createProduitModal">
        Créer un produit
    </button>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Description courte</th>
                <th>Description</th>
                <th>Prix</th>
                <th>Quantite</th>
                <th>Mis en avant</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            <?php
            if($produits != null && count($produits) > 0) {
                for ($i = 0; $i < count($produits); $i++) {
                    echo "<tr>";
                    echo "<td>". $produits[$i]->getId() . "</td>";
                    echo "<td>". $produits[$i]->getNom() ."</td>";
                    echo "<td>". $produits[$i]->getShortDesc() ."</td>";
                    echo "<td>". $produits[$i]->getDescription() ."</td>";
                    echo "<td>". $produits[$i]->getPrix() ."</td>";
                    echo "<td>". $produits[$i]->getQuantite() ."</td>";
                    if($produits[$i]->getEnAvant() == 1) {
                        echo "<td>Oui</td>";
                    } else {
                        echo "<td>Non</td>";
                    }
                    
                    // Boutons d'action
                    echo "<td>";
                    
                    echo "<button type='button' class='btn btn-primary edit-button' data-toggle='modal' data-target='#editProduitModal' data-id='" . $produits[$i]->getId() . "'>Editer</button>";
                    echo "<form method='post' action=''>";
                    echo "<input type='hidden' name='action' value='delete'>";
                    echo "<input type='hidden' name='id' value='" . $produits[$i]->getId() . "'>";
                    echo "<button type='submit' name='submit' class='btn btn-danger' onclick=\"return confirm('Voulez-vous vraiment supprimer ce produit ?')\">Supprimer</button>";
                    echo "</form>";
                    echo "</td>";
                    
                    echo "</tr>";
                }
            }else{
                echo "<div class='alert alert-info'>Aucun produit trouvé. Vous pouvez en créez ici !</div>";
            }
            ?>
        </tbody>
    </table>
</div>
<script>
    function addProduitsIDToURL(produitID) {
            var currentURL = window.location.href;
            var separator = currentURL.indexOf('?') !== -1 ? '&' : '?';
            var newURL = currentURL + separator + 'id=' + produitID;
            window.history.pushState({ path: newURL }, '', newURL);
        }

    function removeProduitIDFromURL() {
        var currentURL = window.location.href;
        var newURL = currentURL.replace(/[?&]id=\d+/g, '');
        window.history.replaceState({ path: newURL }, '', newURL);
    }
    document.addEventListener('DOMContentLoaded', function () {
        var editProduitModal = document.getElementById('editProduitModal');
        var editButtons = document.querySelectorAll('.edit-button');

        editButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                var produitId = button.getAttribute('data-id');
                if (window.location.href.indexOf('id=') !== -1) {
                    removeProduitIDFromURL();
                }
                addProduitsIDToURL(produitId);

                $('#editProduitModal').modal('show');
            });
        });
    });
</script>


<?php
if (isset($_POST['action']) && $_POST['action'] === 'delete') {
    $id = $_POST['id'];
    delete($produit, $id);
}

if ($redirectNeeded) {
    echo '<script>window.location.href = "index.php?page=admin&sous-page=produit";</script>';
    exit();
}
?>