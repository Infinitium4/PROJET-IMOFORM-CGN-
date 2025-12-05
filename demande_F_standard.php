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
                <label class="form-label" for="titre">Niveau</label>
                <input id="Niveau" type="text" placeholder="Ex : Débutant, Intermédiaire, Professionel" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label" for="titre">Secteur Concerné</label>
                <input id="secteur_concernee" type="text" class="form-control">
            </div>
            <button type="submit" class="btn btn-success w-100">Envoyer</button>
        </form>
    </div>
</form>
<a id="boutonRetour" btn btn-danger" href="formation_en_ligne.php">Retour</a>

