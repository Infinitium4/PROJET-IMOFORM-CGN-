<?php
include "header.php";
include "navbar.php";
?>
<div class="form-box">
    <h3>Connexion</h3>
    <form action="actions/connexion.php" method="post" class="mt-3">
        <div class="mb-3">
            <label class="form-label" name="adresse_mail">adresse mail</label>
            <input id="titre" type="text" required maxlength="65" name="titre" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label" name="mdp">mod de passe</label>
            <input id="titre" type="text" required maxlength="65" name="titre" class="form-control">
        </div>
        <input type="hidden" name="token" value="<?php echo $token; ?>">

        <button type="submit" class="btn btn-success w-100">OK</button>
    </form>
</div>

<?php
include "footer.php";
?>