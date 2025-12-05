<?php
include "header.php";
include "navbar.php";
?>

<?php

$req = $pdo->prepare("Select type_profile From compte");
$req->execute();
$type_profil = $req->fetchAll();

$agences = "select id_agence from travail where id_utilisateur = id_contact";
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
$req=$pdo->prepare("INSERT INTO produits (Forme, Hauteur_cm, Prix, FixationMurale) VALUES (:Forme, :Hauteur_cm, :Prix, :FixationMurale)");
$req->bindParam(':Forme', $Forme);
$req->bindParam(':Hauteur_cm', $Hauteur_cm);
$req->bindParam(':Prix', $Prix);
$req->bindParam(':FixationMurale', $FixationMurale);


$req->execute();