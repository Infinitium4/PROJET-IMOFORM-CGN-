<?php
include "header.php";
include "navbar.php";
?>
<div class="form-box">
    <h3>Formation</h3>
    <form action="actions/" method="post" class="mt-3">
        
        <div class="mb-3">
            <label class="form-label" for="titre">Titre</label>
            <input id="titre" type="text" required maxlength="65" name="titre" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label" for="description">Description</label>
            <textarea id="description" name="description" class="form-control" rows="4"></textarea>
        </div>

        <div class="mb-3">
    <label class="form-label" for="duree">Durée</label>
    <div class="d-flex gap-2">
        <input type="number" id="heures" name="heures" class="form-control" placeholder="Heures" min="0">
        <input type="number" id="minutes" name="minutes" class="form-control" placeholder="Minutes" min="0" max="59">
    </div>
</div>

        <div class="mb-3">
            <label class="form-label" for="date_heure">Date & Heure</label>
            <input id="date_heure" type="datetime-local" name="date_heure" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label" for="cout_formation">Coût formation</label>
            <input id="cout_formation" type="number"  min= "0" name="cout_formation" class="form-control" rows="2">
        </div>

        <div class="mb-3">
            <label class="form-label" for="commentaire">Commentaire</label>
            <textarea id="commentaire" name="commentaire" class="form-control" rows="4"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label" for="lien">Lien</label>
            <textarea id="lien" name="lien" class="form-control" rows="2" placeholder="Ex : https://immoform.com/lien"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label" for="adresse">Adresse</label>
            <textarea id="adresse" name="adresse" class="form-control" rows="2"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label" for="ville">Ville</label>
            <textarea id="ville" name="ville" class="form-control" rows="2"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label" for="code_postal">Code postal</label>
            <textarea id="code_postal" name="code_postal" maxlength="11" class="form-control" rows="1" placeholder="Ex : 75001"></textarea>
        </div>

        <input type="hidden" name="token" value="<?php echo $token; ?>">

        <button type="submit" class="btn btn-success w-100">envoyer</button>
    </form>
</div>
































<?php
include "navbar.php";
include "header.php";
$token=rand(0,1000000);
$_SESSION["token"]=$token;
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

