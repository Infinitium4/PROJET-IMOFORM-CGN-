<?php
include "header.php";
include "navbar.php";

if (!empty($_SESSION['adresse_utilisateur'])) {
    $user_id = $_SESSION['adresse_utilisateur'];

    $req = $pdo->prepare("SELECT type_profile FROM compte WHERE id = ?");
    $req->execute([$user_id]);
    $type_profil = $req->fetchColumn();

    $req = $pdo->prepare("SELECT id_agence FROM travail WHERE id_contact = ?");
    $req->execute([$user_id]);
    $agences = $req->fetchAll(PDO::FETCH_COLUMN);

    if ($type_profil !== "contact") {
        echo "Vous ne remplissez pas les critères pour accéder à cette page.";
    } else {
        foreach ($agences as $id_agence) {
            $req = $pdo->prepare("SELECT adherant FROM agence WHERE id = ?");
            $req->execute([$id_agence]);
            $adherant = $req->fetchColumn();

            if ($adherant) {
                echo '<a href="demande_F_ligne.php" class="btn" id="boutonRecurante">Faire une demande</a>';
                break;
            }
        }
    }
}
?>
<a href="demande_F_ligne.php" class="btn" id="boutonRecurante">Faire une demande</a>