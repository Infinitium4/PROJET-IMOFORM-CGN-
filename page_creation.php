<?php
include "header.php";
include "navbar.php";
?>
    <div class="form-box">
        <h3>Créer</h3>
        <form action="actions/insert_compte.php" method="post" class="mt-3">
            <div class="mb-3">
                <label class="form-label" for="titre">adresse mail</label>
                <input id="mail" type="email" name="adresse_mail" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label" for="titre">mod de passe</label>
                <input id="mdp" type="password" name="mdp" class="form-control" required>
            </div>

            <label class="mb-3">
                <label class="form-label" for="titre">Type de Profil</label>
                <br>
                <input type="radio"  name="choix" value="formateurs">
                formateur
            </label>

            <label class="mb-3">
                <input type="radio"  name="choix" value="contacts">
                contact
            </label>

            <input type="hidden" name="token" value="<?php echo $token; ?>">
            <br>
                <input class="btn btn-success w-50" type="submit" value="ok">
                <a href="page_connexion.php" class="btn btn-secondary w-50" role="button" >retour</a>
            
        </form>
    </div>
<?php
include "footer.php";
?>