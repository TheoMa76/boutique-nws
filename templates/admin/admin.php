<?php

require_once "./templates/includes/layoutGeneral.inc.php";
require_once "./src/crud/crud.php";
require_once "./configs/dbConnect.php";

$result = read("users");
dd($result);

?>

<title>Page d'Administration</title>

<h1>Liste des Utilisateurs</h1>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Rôle</th>
            <th>Date de création</th>
            <th>Date de modification</th>
            <th>Dernière connexion</th>
            <!-- Ajoutez d'autres colonnes selon vos besoins -->
        </tr>

        <?php
        dd(count($result));
        // Affichez les données des utilisateurs dans le tableau
       for($i = 0; $i < count($result); $i++) {
            echo "<tr>";
            echo "<td>" . $result[$i]['id'] . "</td>";
            echo "<td>" . $result[$i]['email'] . "</td>";
            echo "<td>" . $result[$i]['role'] . "</td>";
            echo "<td>" . $result[$i]['createdAt'] . "</td>";
            echo "<td>" . $result[$i]['updatedAt'] . "</td>";
            echo "<td>" . $result[$i]['lastLogin'] . "</td>";
            // Ajoutez d'autres colonnes selon vos besoins
            echo "</tr>";
        }
        ?>

    </table>