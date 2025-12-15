<?php
include "header.php";
include "navbar.php";
?>

<div class="container mt-4">
    <div class="bulle">
        <h1>Formations en présentiel</h1>
        <p>Nos <strong>formations en présentiel</strong> permettent à vos équipes de bénéficier d'une expérience immersive dans des lieux adaptés. Animées par des formateurs experts, ces sessions offrent un apprentissage pratique et un échange direct avec des professionnels du secteur.</p>
    </div>

    <div class="bulle">
        <h2>Pourquoi choisir nos formations en présentiel :</h2>
        <ul>
            <li>Apprentissage pratique et interactif avec les formateurs.</li>
            <li>Échanges et retours d'expérience entre participants.</li>
            <li>Capacité d'accueil adaptée à la taille de votre équipe.</li>
            <li>Supports pédagogiques fournis et consultables après la formation.</li>
            <li>Suivi post-formation pour appliquer les connaissances acquises.</li>
        </ul>
    </div>

    <div class="bulle">
        <p>Chaque formation inclut le matériel nécessaire et des supports pour révision après la session.</p>
        <img src="media/formationStandard.png" alt="Formation présentiel">
    </div>

    <div class="bulle">
        <h2>Nos prochaines formations standard :</h2>
        <ul>
            <?php
                $req = $pdo->prepare("SELECT fp.titre, fp.description, fp.duree, fp.niveau, fp.secteur_concernee, fp.date_heure_debut, fp.adresse, fp.ville, fp.code_postal, fp.capacite_acceuil, f.nom, f.prenom, COUNT(DISTINCT i.id_contact) AS places FROM formations_presentiel fp 
                                      RIGHT JOIN formateurs_assignes fa ON fa.type_formation='formation_presentiel' && fa.id_formation=fp.id 
                                      JOIN formateurs f ON f.id=fa.id_formateur 
                                      JOIN inscriptions i ON i.type_formation='formation_presentiel' && i.id_formation=fp.id 
                                      WHERE fp.date_heure_debut <= DATE_ADD(:date_heure, INTERVAL 1 DAY)");
                $req->bindParam(':date_heure', $_SESSION["date_heure"]);
                $req->execute();
                $formations = $req->fetchAll(PDO::FETCH_ASSOC);
                if(isset($formations["titre"])){
                    foreach($formations as $formation){
                        echo '<li><strong>'.$formation["titre"].'</strong> - Description : '.$formation["description"].' - Durée : '.$formation["duree"].' - Niveau : '.$formation["niveau"].' - Secteur concernée : '.$formation["secteur_concernee"].' - Date et Heure : '.$formation["date_heure_debut"].' - Lieux de la formation : '.$formation["adresse"].$formation["ville"].$formation["code_postal"].' - Formateur : '.$formation["nom"].$formation["prenom"].'</li><p>Places disponnibles : '.$formation["places"].'/'.$formation["capacite_acceuil"].'</p>';
                        if($formation["places"]>=$formation["capacite_acceuil"]){
                            echo '<a href="validation_F_ligne.php" id="boutonachat">s\'inscrire</a>';
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