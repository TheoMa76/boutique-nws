<?php

require_once "./templates/includes/layoutGeneral.inc.php";
require_once "./templates/includes/adminmenu.inc.php";
require_once "./src/crud/crud.php";
require_once "./configs/dbConnect.php";
require_once "./src/Repository/CommandesRepository.php";

use Theo\Repository\CommandesRepository;
use Theo\Entity\Commandes;


$result = read("commandes");
$commandeID = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : '';
$repository = new CommandesRepository();
$commande = $repository->findById($commandeID);
?>

<title>Liste des commandes</title>

<div class="container mt-5">
    <h1>Liste des commandes</h1>

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Adresse</th>
                <th>Telephone</th>
                <th>Envoyé</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>

        <script>
    function addCommandeIDToURL(commandeID) {
            var currentURL = window.location.href;
            var separator = currentURL.indexOf('?') !== -1 ? '&' : '?';
            var newURL = currentURL + separator + 'id=' + commandeID;
            window.history.pushState({ path: newURL }, '', newURL);
        }

    function removeCommandeIDFromURL() {
        var currentURL = window.location.href;
        var newURL = currentURL.replace(/[?&]id=\d+/g, '');
        window.history.replaceState({ path: newURL }, '', newURL);
    }
    document.addEventListener('DOMContentLoaded', function () {
        var editButtons = document.querySelectorAll('.edit-button');

        editButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                var produitId = button.getAttribute('data-id');
                if (window.location.href.indexOf('id=') !== -1) {
                    removeProduitIDFromURL();
                }
                addProduitsIDToURL(produitId);
            });
        });
    });
</script>

<?php

if (count($result) > 0) {
    
    for( $i = 0; $i < count($result); $i++ ) {
        echo "<tr>";
            echo "<td>" . $result[$i]["id"] . "</td>";
            echo "<td>" . $result[$i]["nom"] . "</td>";
            echo "<td>" . $result[$i]["adresse"] . "</td>";
            echo "<td>" . $result[$i]["telephone"] . "</td>";
            if ($result[$i]["envoye"]) {
                echo "<td>Oui</td>";
            } else {
                echo "<td>Non</td>";
            }
            echo "<td>";
            echo "<form method='post' action=''>";
                echo "<input type='hidden' name='action' value='edit'>";
                echo "<input type='hidden' name='id' value='" . $result[$i]["id"] . "'>";
                echo "<button type='submit' class='btn btn-primary edit-button'  data-id='" . $result[$i]["id"] . "'>Marquer comme envoyé</button>";
            echo "</form>";
            echo "</td>";
        echo "</tr>";
        
        
        
        echo "</tr>";
    }
    
    echo "</table>";
} else {
    echo "<td colspan='5'>Aucune donnée</td>";
    echo "<div class='alert alert-info'>Aucune commande trouvée. Patientez... quelqu'un finira bien par acheter un truc.. nan ?</div>";
}

if (isset($_POST['action']) && $_POST['action'] == 'edit') {
    if($commande->getEnvoye() == true){
        echo "<div class='alert alert-danger'>Cette commande a déjà été envoyée !</div>";
    } else {
    $commande->setEnvoye(true);
    update($commande, $commandesID);
    }
}

