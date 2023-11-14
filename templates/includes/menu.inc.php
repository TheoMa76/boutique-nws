<?php
session_start();
?>
<style>
        .navbar {
           z-index: 9999;
        }
    </style>
    
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Boutique-NWS</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="./?page=accueil">Accueil <span class="sr-only">(current)</span></a>
        </li>
        <?php
         if (isset($_SESSION['user']) && $_SESSION['user_role'] == 'admin') {
          // Si l'utilisateur a le role admin
            echo '
            <li class="nav-item">
            <a class="nav-link" href="./?page=admin">Administration</a>
            </li>
            ';
        } 
        ?>
        <li class="nav-item">
          <a class="nav-link" href="./?page=produits">Produits</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Mon Compte
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php
                    if (isset($_SESSION['user'])) {
                        // Si l'utilisateur est connecté
                        echo '
                        <a class="dropdown-item" href="./?page=panier">Mon panier</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="./?page=logout">Déconnexion</a>
                        ';
                    } else {
                        // Si aucun utilisateur n'est connecté
                        echo '
                        <a class="dropdown-item" href="./?page=register">Inscription</a>
                        <a class="dropdown-item" href="./?page=login">Connexion</a>
                        ';
                    }
                    ?>
          </div>
        </li>
      </ul>
    </div>
  </nav>

</div>