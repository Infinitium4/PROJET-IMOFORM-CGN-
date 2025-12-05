<?php
include "navbar.php";
include "header.php";
?>

<form action="actions/" method="post" class="mt-3">
    <input type="hidden" name="id" value="<?php echo $id ?>" />
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
                <label class="form-label" for="duree">Durée</label>
                <div class="d-flex gap-2">
                    <input type="number" id="heures" name="heures" class="form-control" placeholder="Heures" min="0">
                    <input type="number" id="minutes" name="minutes" class="form-control" placeholder="Minutes" min="0" max="59">
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label" for="titre">Niveau</label>
                <input id="Niveau" type="text" placeholder="Ex : Débutant, Intermédiaire, Professionel" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label" for="titre">Secteur Concerné</label>
                <input id="secteur_concernee" type="text" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label" for="titre">Date et Heure</label>
                <input id="date_heure" type="datetime-local" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label" for="titre">Accès Url</label>
                <input id="url_access" type="text" placeholder="Ex : https://www.google.com" maxlength="65" class="form-control">
            </div>
            <button type="submit" class="btn btn-success w-100">Envoyer</button>
        </form>
    </div>
</form>
<a id="boutonRetour" btn btn-danger" href="formation_en_ligne.php">Retour</a>

