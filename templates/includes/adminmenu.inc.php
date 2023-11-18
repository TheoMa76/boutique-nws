<style>
        .sidebar-sticky {
            position: fixed;
            height: 100vh;
            min-width: 7.5vw;
            padding: 48px 0;
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, 0.1); /* Ombre sur le côté gauche */
            background-color: #343a40;
        }

        .sidebar-sticky .nav-link {
            color: #fff;
            font-weight: 500;
            padding: 10px 16px;
            text-decoration: none;
        }

        .sidebar-sticky .nav-link:hover{
            color: #FEFEE2;
            font-weight: 500;
            padding: 10px 16px;
            text-decoration: none;
        }
    </style>

<div class="container-fluid">
    <div class="row">
        <nav class="sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="./?page=admin&sous-page=produit">
                            Produits
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./?page=admin&sous-page=user">
                            Utilisateurs
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./?page=admin&sous-page=commande">
                            Commandes
                        </a>
                    </li>
                </ul>
            </div>
        </nav>