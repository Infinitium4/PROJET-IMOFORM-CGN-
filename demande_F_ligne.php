<?php
include "navbar.php";
include "header.php";
?>

<form action="formation_en_ligne.php" method="post" class="mt-3">
    <input type="hidden" name="id" value="<?php echo $id ?>" />
    <div class="form-box">
        <form action="actions/" method="post" class="mt-3">
            <div class="mb-3">
                <label class="form-label" for="titre">Titre</label>
                <input id="titre" type="text" maxlength="65" name="titre" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label" for="titre">Description</label>
                <input id="Description" type="text" name="titre" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label" for="titre">Durée</label>
                <input id="Duree" type="text" name="titre" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label" for="titre">Niveau</label>
                <input id="Niveau" type="text" name="titre" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label" for="titre">Description</label>
                <input id="Description" type="text" name="titre" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label" for="titre">Description</label>
                <input id="Description" type="text" name="titre" class="form-control">
            </div>

            <button type="submit" class="btn btn-success w-100">OK</button>
        </form>
    </div>
</form>
