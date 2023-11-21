<?php
use Theo\Repository\UsersRepository;

require_once "./templates/includes/layoutGeneral.inc.php";
require_once "./src/crud/crud.php";
require_once "./configs/dbConnect.php";
require_once "./src/Repository/ProduitsRepository.php";

use Theo\Repository\ProduitsRepository;
use Theo\Entity\Produits;

$repository = new ProduitsRepository();
$produits = $repository->findByEnAvant();

?>

<title>Boutique NWS</title>

<div class="container mt-5">
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


<div class="container mt-4">
    <h1 class="text-primary">Normandie Web School - Boutique en Ligne</h1>

    <p class="lead">La boutique en ligne de Normandie Web School est l'endroit idéal pour acquérir des produits dérivés uniques, mettant en valeur l'esprit dynamique de l'école. Les étudiants, anciens élèves, et passionnés de la technologie peuvent trouver une variété d'articles exclusifs qui célèbrent la culture de NWS.</p>

    <h2 class="text-primary mt-4 mb-3">Produits Disponibles :</h2>

    <ul class="list-group">
        <li class="list-group-item"><strong>Vêtements et Accessoires :</strong> T-shirts, sweat-shirts, casquettes, et autres articles arborant fièrement le logo distinctif de NWS.</li>
        <li class="list-group-item"><strong>Articles de Papeterie :</strong> Carnets, stylos, et fournitures de bureau élégantes aux couleurs de l'école.</li>
        <li class="list-group-item"><strong>Produits Technologiques :</strong> Coques de téléphone, tapis de souris, et autres gadgets tech avec des designs uniques.</li>
    </ul>

    <h2 class="text-primary mt-4 mb-3">Engagement Social :</h2>

    <p>Les recettes générées par la boutique en ligne contribuent au financement de projets étudiants, d'événements académiques et d'initiatives communautaires. Ainsi, chaque achat soutient directement la croissance et le dynamisme de la communauté NWS.</p>

</div>
<div class="text-center"><h2>Produits mis en avant</h2></div>
<div class="row">
        <?php

        if ($produits != null && count($produits) > 0) {
            foreach ($produits as $produit) {
                ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $produit->getNom(); ?></h5>
                            <?php if ($produit->getImage()) : ?>
                                <img class="card-img-top card-img" src="<?php echo $produit->getImage(); ?>" alt="Image du produit">
                            <?php endif; ?>
                            <p class="card-text"><?php echo $produit->getShortDesc(); ?></p>
                            <p class="card-text">Prix: <?php echo $produit->getPrix(); ?></p>
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
</div>

