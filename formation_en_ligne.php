<?php
include "header.php";
include "navbar.php";
?>

<?php

$req = $pdo->prepare("Select type_profile From compte");
$req->execute();
$type_profil = $req->fetchAll();

$req = $pdo->prepare("select id_agence from travail where id_utilisateur = id_contact");
$req->execute();
$agences = $req->fetchAll();

$adherants = false;

if ($type_profil != "contact") {
    echo "Vous ne remplissez pas les critères pour accéder à cette page.";
} else {
    foreach (agences as $agence) {
        $adherants = "select adherant from agence where $agence = id";
        if ($adherants == true) {
            echo '<a href="demande_F_ligne.php" class="btn" id="boutonRecurante">faire une demande</a>';
        }
    }
}
?>