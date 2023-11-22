<?php
use Theo\Repository\ProduitsRepository;


    require_once "./templates/includes/layoutGeneral.inc.php";
    require_once "./src/Repository/ProduitsRepository.php";



    // Initialiser le repository des produits
    $produitsRepository = new ProduitsRepository();
    $redirectNeeded = false;

    foreach ($_SESSION['cart'] as $produitID => $quantite) {
        // Obtenir les informations sur le produit
        $produit = $produitsRepository->findById($produitID);

        // Vérifier si le produit existe
        if ($produit) {
            // Ajouter le produit à la liste avec la quantité
            $produit->setQuantite($quantite);
            $produits[] = $produit;
        }
    }

    ?>

    <title>Panier</title>

    <div class="container mt-5">
        <h1>Panier</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Prix unitaire</th>
                    <th>Quantité</th>
                    <th>Prix</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $totalT = 0;
                foreach ($produits as $produit) {
                    $produitID = $produit->getId();
                    $prixUnitaire = $produit->getPrix();
                    $quantite = $_SESSION['cart'][$produitID];
                    $total = $prixUnitaire * $quantite;
                    $totalT += $total;
                    ?>

                    <tr>
                        <td><?php echo $produit->getNom(); ?></td>
                        <td><?php echo $prixUnitaire; ?></td>
                        <td>
                            <form method="post" action="">
                                <input type="hidden" name="action" value="updateCart">
                                <input type="hidden" name="produitID" value="<?php echo $produitID; ?>">
                                <input type="number" name="quantite" value="<?php echo $quantite; ?>" min="1">
                                <button type="submit" class="btn btn-primary">Mettre à jour</button>
                            </form>
                        </td>
                        <td><?php echo $total; ?></td>
                        <td>
                            <form method="post" action="">
                                <input type="hidden" name="action" value="removeFromCart">
                                <input type="hidden" name="produitID" value="<?php echo $produitID; ?>">
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>

                <?php
                }
                ?>
                <tr>
                        <td colspan="4" class="text-right">Total</td>
                        <td><?php echo $totalT; ?></td>
                    </tr>
            </tbody>
        </table>

        <div>
            <a href="?page=catalogue" class="btn btn-secondary">Continuer vos achats</a>
            <a href="?page=payer" class="btn btn-success">Payer</a>
        </div>
    </div>

<?php

if(isset($_POST['action']) && $_POST['action'] === 'updateCart') {
    $produitID = $_POST['produitID'];
    $quantite = (int)$_POST['quantite'];

    addToCart($produitID, $quantite);
    echo '<script>window.location.reload;</script>';

}

if(isset($_POST['action']) && $_POST['action'] === 'removeFromCart') {
    $produitID = $_POST['produitID'];
    unset($_SESSION['cart'][$produitID]);
    echo '<script>window.location.reload;</script>';
}

function addToCart($produitID, $quantite)
    {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        if (isset($_SESSION['cart'][$produitID])) {
            $_SESSION['cart'][$produitID] = $quantite;
        } else {

            $_SESSION['cart'][$produitID] = $quantite;
        }

    }



?>
