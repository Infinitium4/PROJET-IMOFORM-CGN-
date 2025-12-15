<?php
include "header.php";
include "navbar.php";
?>

<form action="actions/insert_F_ligne.php" method="post" class="mt-3">
    <input type="hidden" name="id" value="<?= $id ?>" />
    <div class="form-box">
        <form action="actions/" method="post" class="mt-3">
            <div class="mb-3">
                <label class="form-label" for="titre">Titre</label>
                <input id="titre" type="text" maxlength="65" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label" for="titre">Description</label>
                <textarea id="Description" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label" for="titre">Niveau</label>
                <input id="Niveau" type="text" placeholder="Ex : Débutant, Intermédiaire, Professionel" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label" for="titre">Secteur Concerné</label>
                <input id="secteur_concernee" type="text" class="form-control">
            </div>
            <input type="hidden" name="token" value="<?= $token ?>">
            <div class="d-flex justify-content-center gap-3">
                <button type="submit" class="btn btn-success w-50">Envoyer</button>
                <a class="btn btn-secondary w-50" href="page_gestion_formations.php" role="button">Retour</a>
            </div>
            </form>
    </div>
</form>


