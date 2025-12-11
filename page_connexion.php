<?php
include "header.php";
include "navbar.php";
?>
<div class="form-box">
    <h3>Connexion</h3>
    <a href="page_creation_compte.php" class="btn" id="BoutonCreation">Créer un compte</a>
    <form action="actions/connexion.php" method="post" class="mt-3">
        <div class="mb-3">
            <label class="form-label" for="titre">adresse mail :</label>
            <input id="titre" type="text" required maxlength="65" name="adresse_mail" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label" for="titre">mod de passe :</label>
            <input id="titre" type="password" required maxlength="65" name="mdp" class="form-control">
        </div>
        <input type="hidden" name="token" value="<?php echo $token; ?>">
        <?php
            if(isset($_SESSION["ConnexionErrorMessage"])){
                echo '<div class="errormessages"><a>'.$_SESSION["ConnexionErrorMessage"].'</a></div>';
            }
        ?>
        <button type="submit" class="btn btn-success w-100">OK</button>
    </form>
</div>

<?php
include "footer.php";
?>