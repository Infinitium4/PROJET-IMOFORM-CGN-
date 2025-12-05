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
            <label class="form-label" for="durée">Durée</label>
            <textarea id="description" name="description" class="form-control" rows="4"></textarea>
        </div>
         
        <div class="mb-3">
            <label class="form-label" for="date_heure">Date & Heure</label>
            <input id="date_heure" type="datetime-local" name="date_heure" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label class="form-label" for="cout_formation">cout formation</label>
            <textarea id="description" name="description" class="form-control" rows="4"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label" for="commentaire">commentaire</label>
            <textarea id="description" name="description" class="form-control" rows="4"></textarea>
        </div>

         <div class="mb-3">
            <label class="form-label" for="lien">lien</label>
            <textarea id="description" name="description" class="form-control" rows="4"></textarea>
        </div>

        <input type="hidden" name="token" value="<?php echo $token; ?>">

        <button type="submit" class="btn btn-success w-100">envoyer</button>
    </form>
</div>
