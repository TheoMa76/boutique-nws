<?php
require_once "./templates/includes/layoutGeneral.inc.php";
?>
    <header>
        <h1>Ma Boutique en Ligne</h1>
    </header>
   <?php
    require_once "./templates/includes/menu.inc.php";
   ?>
    <div class="container">
        <div class="product">
            <img src="example_product1.jpg" alt="Product 1">
            <h3>Nom du Produit 1</h3>
            <p>Description du produit 1. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            <p>Prix: $19.99</p>
            <button>Ajouter au panier</button>
        </div>
        <div class="product">
            <img src="example_product2.jpg" alt="Product 2">
            <h3>Nom du Produit 2</h3>
            <p>Description du produit 2. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            <p>Prix: $29.99</p>
            <button>Ajouter au panier</button>
        </div>
    </div>
</body>
</html>
