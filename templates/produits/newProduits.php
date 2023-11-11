<?php
use Theo\Entity\Produits;

require_once "./templates/includes/layoutGeneral.inc.php";
require_once "./src/crud/crud.php";
require_once "./src/Entity/Produits.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nom = $_POST["nom"];
    $shortDesc = $_POST["shortDesc"];
    $description = $_POST["description"];
    $prix = $_POST["prix"];
    $quantite = $_POST["quantite"];
    $enAvant = isset($_POST["enAvant"]) ? 1 : 0;

    $nouveauProduit = new Produits($nom, $shortDesc, $description, $prix, $quantite, $enAvant);


    $crud->create($nouveauProduit);
    echo "Produit créé avec succès !";
    // header("Location: confirmation.php");
    // exit();
}
?>

<div class="container mt-5">
    <h1>Création de Produit</h1>

    <form action="traitement_formulaire.php" method="post">
        <div class="form-group">
            <label for="nom">Nom :</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
        </div>

        <div class="form-group">
            <label for="shortDesc">Description courte :</label>
            <input type="text" class="form-control" id="shortDesc" name="shortDesc" required>
        </div>

        <div class="form-group">
            <label for="description">Description :</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>

        <div class="form-group">
            <label for="prix">Prix :</label>
            <input type="number" class="form-control" id="prix" name="prix" step="0.01" required>
        </div>

        <div class="form-group">
            <label for="quantite">Quantité :</label>
            <input type="number" class="form-control" id="quantite" name="quantite" required>
        </div>

        <div class="form-group">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="enAvant" name="enAvant">
                <label class="custom-control-label" for="enAvant">Mettre en avant</label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Créer Produit</button>
    </form>
</div>