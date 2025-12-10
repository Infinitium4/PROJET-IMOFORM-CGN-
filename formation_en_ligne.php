<?php
include "header.php";
include "navbar.php";

if (isset($_SESSION['compte']["type_profile"]) && $_SESSION['compte']["type_profile"] == "contacts") {
    $req = $pdo->prepare("SELECT a.adherent, a.id, a.nom FROM agences a JOIN travail t ON t.id_agence=a.id WHERE t.id_contact=:id_client AND adherent=TRUE");
    $req->bindParam(':id_client', $_SESSION["compte"]["id_utilisateur"]);
    $req->execute();
    $agences = $req->fetch(PDO::FETCH_ASSOC);
    if($agences){
        echo '<a href="demande_F_ligne.php" class="btn" id="boutonRecurante">Commander</a>';
        foreach($agences as $agence){     
            $_SESSION["compte"]["agences"][]=$agence;           
        }
    }
}
?>
<h1>Voici nos formations en ligne</h1>