<?php
use Theo\Entity\Produits;

require_once "./templates/includes/layoutGeneral.inc.php";
require_once "./src/crud/crud.php";
require_once "./src/Entity/Produits.php";
require_once "./src/Repository/ProduitsRepository.php";

use Theo\Repository\ProduitsRepository;

$produitID = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : '';
$repository = new ProduitsRepository();
$produit = $repository->findById($produitID);

if(isset($_POST['editProduitBtn'])) {

    $nom = $_POST["nom"];
    $shortDesc = $_POST["shortDesc"];
    $description = $_POST["description"];
    $prix = $_POST["prix"];
    $quantite = $_POST["quantite"];
    $enAvant = isset($_POST["enAvant"]) ? 1 : 0;

    $produit->setNom($nom);
    $produit->setShortDesc($shortDesc);
    $produit->setDescription($description);
    $produit->setprix($prix);
    $produit->setQuantite($quantite);
    $produit->setEnAvant($enAvant);

    update($produit, $produitID);
    echo "Produit modifié avec succès !";
}

?>

<div class="modal fade" id="editProduitModal" tabindex="-1" role="dialog" aria-labelledby="editProduitModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editProduitModalLabel">Modifier un produit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="">
            <div class="form-group">
                    <label for="nom">Nom :</label>
                    <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $produit->getNom(); ?>" required>
                </div>

                <div class="form-group">
                    <label for="shortDesc">Description courte :</label>
                    <input type="text" class="form-control" id="shortDesc" name="shortDesc" value="<?php echo $produit->getShortDesc(); ?>" required>
                </div>

                <div class="form-group">
                    <label for="description">Description :</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required><?php echo $produit->getDescription(); ?></textarea>
                </div>

                <div class="form-group">
                    <label for="prix">Prix :</label>
                    <input type="number" class="form-control" id="prix" name="prix" step="0.5" value="<?php echo $produit->getPrix(); ?>" required>
                </div>

                <div class="form-group">
                    <label for="quantite">Quantité :</label>
                    <input type="number" class="form-control" id="quantite" name="quantite" value="<?php echo $produit->getQuantite(); ?>" required>
                </div>

                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="enAvant" name="enAvant" <?php echo ($produit->getEnAvant() == 1) ? 'checked' : ''; ?>>
                        <label class="custom-control-label" for="enAvant">Mettre en avant</label>
                    </div>
                </div>
                        <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary" name="editProduitBtn">Créer</button>
                    </div>
            </form>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>