<?php
include "header.php";
include "navbar.php";

if ($_SESSION["compte"]["type_profile"] !== "formateurs"){
    die("PROFIL ERROR. Vous n'avez pas les droits pour acceder a cette page");
}

$id_session = $_SESSION["compte"]["id_utilisateur"];
$req=$pdo->prepare("SELECT * FROM demande_conseils WHERE statut='en attente'");
$req->execute();
$demandes = $req->fetchAll();


//DEMANDES


if (empty($demandes)){
    ?>
    <div class="Gestion_formation">
        <div class="bulle">
            <h1>Demande de formation en cours</h1>
            <p>Il n'y a pas de formulaire de demande de conseil à complêter.</p>
        </div>
    </div><?php
}
else{?>
<div class="Gestion_formation">
    <div class="bulle">
        <h1>Demande de formation en cours</h1>
    </div>

    <div class="row">
    <?php foreach ($demandes as $demande){
        $req=$pdo->prepare("SELECT nom FROM agences WHERE id=:id_agence");
        $req->bindParam(':id_agence', $demande["id_agence"]);
        $req->execute();
        $agence = $req->fetch(PDO::FETCH_ASSOC);

        $req=$pdo->prepare("SELECT nom, prenom FROM contacts WHERE id=:id_contact");
        $req->bindParam(':id_contact', $demande["id_contact"]);
        $req->execute();
        $contact = $req->fetch(PDO::FETCH_ASSOC); ?>
        <div class="col-12 col-sm-6 col-md-3 mb-4">
            <div class="card mb-3">

                <div class="row no-gutters">
                    <div class="col-md-12">
                        <img src="media/logo_cp.png" class="card-img-top" alt="logo_conseil_personnalisée">
                    </div>

                    <div class="col-md-12">
                        <div class="card-body">
                            <p class="card-text"><strong> Agence :</strong></p>
                            <p class="card-text"><?= $agence["nom"] ?></p>

                            <p class="card-text"><strong> Nom contact :</strong></p>
                            <p class="card-text"><?= $contact["nom"].' '.$contact["prenom"] ?></p>

                            <p class="card-text"><strong> type de conseil</strong></p>
                            <p class="card-text"><?= $demande["type_conseil"] ?></p>

                            <p class="card-text"><strong> description :</strong></p>
                            <p class="card-text"><?= $demande["description"] ?></p>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <p class="card-text">
                        <small class="text-muted">
                            date de la demande : <?= $demande["date_demande"] ?>
                        </small>
                    </p>
                    <div class="d-flex justify-content-center gap-3">
                        <form action="actions/valider_demande.php" method="post">
                            <input type="hidden" name="token" value="<?= $token ?>">
                            <input type="hidden" name="id_formation" value="<?= $demande['id'] ?>">
                            <input type="hidden" name="id_formateur" value="<?= $id_session ?>">
                            <button type="submit" class="btn btn-success ">Valider</button>
                        </form>

                        <form action="actions/rejeter_demande.php" method="post">
                            <input type="hidden" name="token" value="<?= $token ?>">
                            <input type="hidden" name="id_formation" value="<?= $demande['id'] ?>">
                            <input type="hidden" name="id_formateur" value="<?= $id_session ?>">
                            <button type="submit" class="btn btn-secondary">Rejeter</button>
                        </form>
                    </div>
                </div>

            </div>
        </div><?php
    }?>
    </div><?php
}

$req=$pdo->prepare("SELECT * FROM demande_conseils WHERE statut='termine' && id_formateur=:id_formateur");
$req->bindParam(':id_formateur', $id_session);
$req->execute();
$formations_a_creer = $req->fetchAll();


//FORMATION


if (empty($formations_a_creer)){
    ?>
    <div class="Gestion_formation">
        <div class="bulle">
            <h1>Demande personnalisé à programmer</h1>
            <p>Il n'y a pas de formulaire de conseil personnalisé à completer</p>
        </div>
    </div><?php
}
else{?>
<div class="Gestion_formation">
    <div class="bulle">
        <h1>Demande personnalisé à programmer</h1>
    </div>

    <div class="row">
    <?php foreach ($formations_a_creer as $formation_a_creer){
        $req=$pdo->prepare("SELECT nom FROM agences WHERE id=:id_agence");
        $req->bindParam(':id_agence', $formation_a_creer["id_agence"]);
        $req->execute();
        $agence = $req->fetch(PDO::FETCH_ASSOC);

        $req=$pdo->prepare("SELECT nom, prenom FROM contacts WHERE id=:id_contact");
        $req->bindParam(':id_contact', $formation_a_creer["id_contact"]);
        $req->execute();
        $contact = $req->fetch(PDO::FETCH_ASSOC); ?>
        <div class="col-12 col-sm-6 col-md-3 mb-4">
            <div class="card mb-3">

                <div class="row no-gutters">
                    <div class="col-md-12">
                        <img src="media/logo_cp.png" class="card-img-top" alt="logo_conseil_personnalisée">
                    </div>

                    <div class="col-md-12">
                        <div class="card-body">
                            <p class="card-text"><strong> Agence :</strong></p>
                            <p class="card-text"><?= $agence["nom"] ?></p>

                            <p class="card-text"><strong> Nom contact :</strong></p>
                            <p class="card-text"><?= $contact["nom"].' '.$contact["prenom"] ?></p>

                            <p class="card-text"><strong> type de conseil</strong></p>
                            <p class="card-text"><?= $formation_a_creer["type_conseil"] ?></p>

                            <p class="card-text"><strong> description :</strong></p>
                            <p class="card-text"><?= $formation_a_creer["description"] ?></p>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <p class="card-text">
                        <small class="text-muted">
                            date de la demande : <?= $formation_a_creer["date_demande"] ?>
                        </small>
                    </p>
                    <div class="button d-flex justify-content-between">
                        <form action="creation_F_conseil.php" method="post">
                            <input type="hidden" name="token" value="<?= $token ?>">
                            <input type="hidden" name="id_formation" value="<?= $formation_a_creer['id'] ?>">
                            <input type="hidden" name="id" value="<?= $id_session; ?>">
                            <button type="submit" class="btn btn-success">Creer la formation</button>
                        </form>
                    </div>
                </div>

            </div>
        </div><?php
    }?>
    </div><?php
}

include "footer.php"; ?>