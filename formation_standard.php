<?php
include "header.php";
include "navbar.php";

if (!empty($_SESSION['adresse_utilisateur'])) {
    $user_id = $_SESSION['adresse_utilisateur'];

    $req = $pdo->prepare("SELECT type_profile FROM compte WHERE id = ?");
    $req->execute([$user_id]);
    $type_profil = $req->fetchColumn();

    if ($type_profil !== "contact") {
        echo "Vous ne remplissez pas les critères pour accéder à cette page.";
    } else {
        echo '<a href="demande_F_standard.php" class="btn" id="boutongoat">faire une demande</a>';
    }
}
?>

<a href="demande_F_standard.php" class="btn" id="boutongoat">Faire une demande</a>