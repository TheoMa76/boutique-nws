<?php
use Theo\Repository\UsersRepository;

require_once "./templates/includes/layoutGeneral.inc.php";
require_once "./src/crud/crud.php";
require_once "./configs/dbConnect.php";
require_once "./src/Repository/ProduitsRepository.php";

use Theo\Repository\ProduitsRepository;
use Theo\Entity\Produits;

$repository = new ProduitsRepository();
$produits = $repository->findAll();

?>

<title>Catalogue</title>

<div class="container mt-5">
    <h1>Catalogue</h1>

    <style>
        .card {
            transition: transform 0.2s;
        }

        .card:hover {
            transform: scale(1.1);
            z-index: 1;
        }

        .blurred {
            filter: blur(2px);
            transition: filter 0.2s;
        }

        .unblurred {
            filter: blur(0);
        }
    </style>

    <script>
        $(document).ready(function () {
            $(".card").hover(
                function () {
                    $(".card").not($(this)).addClass("blurred");
                    $(this).removeClass("blurred").addClass("unblurred");
                },
                function () {
                    $(".card").removeClass("blurred unblurred");
                }
            );
        });
    </script>

    <div class="row">
        <?php
        if ($produits != null && count($produits) > 0) {
            foreach ($produits as $produit) {
                ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 d-flex flex-column">
                       
                        <a href="?page=catalogue&sous-page=detail&id=<?php echo $produit->getId(); ?>" style="text-decoration: none; color: inherit;"
                            class="flex-grow-1">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $produit->getNom(); ?></h5>
                                <?php if ($produit->getImage()) : ?>
                                    <img class="card-img-top card-img" src="<?php echo $produit->getImage(); ?>" alt="Image du produit">
                                <?php endif; ?>
                                <p class="card-text"><?php echo $produit->getShortDesc(); ?></p>
                                <p class="card-text">Prix: <?php echo $produit->getPrix(); ?></p>
                                <p class="card-text">Quantité: <?php echo $produit->getQuantite(); ?></p>
                            </div>
                        </a>
                        <div class="card-footer text-center">
                            <form method="post" action=''>
                                <input type='hidden' name='action' value='addToCart'>
                                <input type="hidden" name="produitID" value="<?php echo $produit->getId(); ?>">
                                <input type="hidden" name="quantite" value="1">
                                <button type="submit" class="btn btn-primary">Ajouter au panier</button>
                            </form>                        
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "<div class='alert alert-info'>Page en construction !</div>";
        }
        ?>
    </div>

    <script>
        $(document).ready(function () {
            $(".add-to-cart").click(function () {
                var produitID = $(this).data("produit-id");
                var quantite = $(this).data("quantite");
            });
        });
    </script>

    <?php
    if (isset($_POST['action']) && $_POST['action'] === 'addToCart') {
        // Récupérer les données du formulaire
        $produitID = $_POST['produitID'];
        $quantite = (int)$_POST['quantite'];

        addToCart($produitID, $quantite);

    }
    function addToCart($produitID, $quantite)
    {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        if (isset($_SESSION['cart'][$produitID])) {
            $_SESSION['cart'][$produitID] += $quantite;
        } else {

            $_SESSION['cart'][$produitID] = $quantite;
        }

    }
    ?>
</div>
