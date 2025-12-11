<?php
include "header.php";
include "navbar.php";

if (isset($_SESSION['compte']["type_profile"]) && $_SESSION['compte']["type_profile"] == "contacts") {
    $req = $pdo->prepare("SELECT a.adherent, a.id, a.nom FROM agences a JOIN travail t ON t.id_agence=a.id WHERE t.id_contact=:id_client AND adherent=TRUE");
    $req->bindParam(':id_client', $_SESSION["compte"]["id_utilisateur"]);
    $req->execute();
    $agences = $req->fetch(PDO::FETCH_ASSOC);
    if($agences){
        echo '<a href="demande_F_ligne.php" id="boutonRecurante">Commander</a>';
        foreach($agences as $agence){     
            $_SESSION["compte"]["agencesAD"][]=$agence;           
        }
    }
}
?>

<div class="container mt-4">
    <div class="bulle">
        <h1>Formations en ligne</h1>
        <p>Nos formations en ligne sont accessibles uniquement aux agences adhérentes à la plateforme. Elles sont conçues pour être flexibles et interactives, afin que vos équipes puissent se former à leur rythme.</p>
    </div>

    <div class="bulle">
        <p>Chaque formation est animée par un formateur spécialisé et comprend des supports en ligne accessibles à tout moment.</p>
        <img src="media/formationEnLigne.png" alt="Formation en ligne">
    </div>

    <div class="bulle">
        <h2>Nos prochains modules en ligne :</h2>
        <ul>

            <li><strong>titre</strong> - Description : x - Durée : x - Niveau : x - Secteur : x - Date et Heure : x x - Formateur : x </li>

        </ul>
    </div>

</div>

<?php
include "footer.php";
?> 