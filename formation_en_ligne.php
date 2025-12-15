<?php
include "header.php";
include "navbar.php";
$_SESSION['date_heure']=date("Y-m-d H:i:s");
?>

<div class="container mt-4">
    <div class="bulle">
        <h1>Formations en ligne</h1>
        <p>Nos <strong>formations en ligne</strong> sont accessibles à toutes les agences adhérentes à notre plateforme. Elles vous permettent de former vos équipes à distance, selon votre rythme, tout en bénéficiant de contenus adaptés à votre secteur d'activité.</p>
    </div>

    <div class="bulle">
        <h2>Avantages des formations en ligne :</h2>
        <ul>
            <li>Accès flexible à tout moment et depuis n'importe où.</li>
            <li>Possibilité de former plusieurs agents simultanément.</li>
            <li>Supports pédagogiques téléchargeables et consultables à tout instant.</li>
            <li>Interaction possible avec le formateur via chat ou visioconférence.</li>
            <li>Suivi et évaluation des progrès de chaque participant.</li>
        </ul>
    </div>

    <div class="bulle">
        <p>Chaque formation est animée par un formateur spécialisé et comprend des supports en ligne accessibles à tout moment.</p>
        <img src="media/formationEnLigne.png" alt="Formation en ligne">
    </div>

    <div class="bulle">
        <h2>Nos prochains modules en ligne :</h2>
        <ul>
            <?php
                $req = $pdo->prepare("SELECT fl.titre, fl.description, fl.duree, fl.niveau, fl.secteur_concernee, fl.date_heure, f.nom, f.prenom FROM formations_en_ligne fl JOIN formateurs f ON f.id=fl.id_formateur WHERE fl.date_heure <= DATE_ADD(:date_heure, INTERVAL 1 DAY)");
                $req->bindParam(':date_heure', $_SESSION["date_heure"]);
                $req->execute();
                $formations = $req->fetchAll(PDO::FETCH_ASSOC);
                if($formations){
                    foreach($formations as $formation){
                        echo '<li><strong>'.$formation["titre"].'</strong> - Description : '.$formation["description"].' - Durée : '.$formation["duree"].' - Niveau : '.$formation["niveau"].' - Secteur concernée : '.$formation["secteur_concernee"].' - Date et Heure : '.$formation["date_heure"].' - Formateur : '.$formation["nom"].$formation["prenom"].' </li>';
                        foreach($_SESSION["compte"]["agence"] as $agence){
                            if($agence["adherent"]){
                                echo '<a href="validation_F_ligne.php" id="bouton">s\'inscrire</a>';
                                break;
                            }else{
                                echo "<a href='' id='bouton'>s'inscrire</a><i>Vos agences ne vous permettent pas l'acces à ces formations</i>";

                            }
                        }   
                    }
                }else{
                    echo "<h4>Désolé, nous n'avons pas de formations disponibles prochainement.<br>Veuillez re-consulter le site ultérieurement</h4>";
                }
            ?>
        </ul>
    </div>

</div>

<?php
include "footer.php";
?> 