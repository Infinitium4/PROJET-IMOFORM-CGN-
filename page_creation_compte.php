<?php
include "header.php";
include "navbar.php";
?>
    <div class="form-box">
        <h3>Créer un compte</h3>
        <form action="actions/insert_compte.php" method="post" class="mt-3">
            <div class="mb-3">
                <label class="form-label" for="titre">adresse mail :</label>
                <?php
                    if(isset($_SESSION["AdresseErrorMessage"])){
                        echo '<div class="errormessages"><a>'.$_SESSION["AdresseErrorMessage"].'</a></div>';
                    }
                ?>
                <input id="mail" type="email" name="adresse_mail" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="titre">mot de passe :</label>
                <input id="mdp" type="password" name="mdp" class="form-control" required>
            </div>

            <label class="mb-3">
                <label class="form-label" for="titre">Type de Profil</label>
                <br>
                <input type="radio"  name="choix" value="formateurs" required>
                formateur
            </label>

            <label class="mb-3">
                <input type="radio"  name="choix" value="contacts">
                contact
            </label>

            <input type="hidden" name="token" value="<?php echo $token; ?>">

            <div class="gbut">
                <input class="btn btn-success" type="submit" value="ok">
                <a href="page_connexion.php" class="btn btn-secondary" role="button" >retour</a>
            </div>

        </form>
    </div>
<?php
include "footer.php";
?>