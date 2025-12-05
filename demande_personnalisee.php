<?php
include "header.php";
include "navbar.php";
$token=rand(0,1000000);
$_SESSION["token"]=$token;
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
            <label class="form-label" for="commentaire">Commentaire</label>
            <textarea id="commentaire" name="commentaire" class="form-control" rows="4"></textarea>
        </div>

        <input type="hidden" name="token" value="<?php echo $token; ?>">

        <button type="submit" class="btn btn-success w-100">envoyer</button>
    </form>
</div>
