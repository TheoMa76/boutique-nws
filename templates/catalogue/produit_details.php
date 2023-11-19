<?php
require_once "./templates/includes/layoutGeneral.inc.php";
require_once "./src/crud/crud.php";
require_once "./configs/dbConnect.php";
require_once "./src/Repository/ProduitsRepository.php";

use Theo\Repository\ProduitsRepository;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $repository = new ProduitsRepository();
    $produit = $repository->findById($id);

    if ($produit) {
        // Affichez les détails du produit
?>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <h5><?php echo $produit->getNom(); ?></h5>
                    <?php if ($produit->getImage()) : ?>
                        <img class="img-fluid" src="<?php echo $produit->getImage(); ?>" alt="Image du produit">
                    <?php endif; ?>
                    <p><?php echo $produit->getDescription(); ?></p>
                    <p>Prix: <?php echo $produit->getPrix(); ?></p>
                    <p>Quantité: <?php echo $produit->getQuantite(); ?></p>
                    <div class="text-center">
                        <a href="ajouter_panier.php?id=<?php echo $produit->getId(); ?>" class="btn btn-primary">Ajouter au panier</a>
                    </div>
                    <div class="text-center mt-3">
                        <a href="?page=catalogue" class="btn btn-secondary">Retour</a>
                    </div>
                </div>
            </div>
        </div>
<?php
    } else {
        echo "<div class='alert alert-danger'>Produit non trouvé.</div>";
    }
} else {
    echo "<div class='alert alert-danger'>ID du produit non spécifié.</div>";
}
?>
