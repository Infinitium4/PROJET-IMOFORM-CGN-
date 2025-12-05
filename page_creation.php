<?php
include "header.php";
include "navbar.php";
?>
    <div class="form-box">
        <h3>Créer</h3>
        <form action="actions/insert_compte.php" method="post" class="mt-3">
            <div class="mb-3">
                <label class="form-label" for="titre">adresse mail</label>
                <input id="titre" type="text" required maxlength="65" name="titre" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label" for="titre" >mod de passe</label>
                <input id="titre" type="text" required maxlength="65" name="titre" class="form-control">
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
            <button type="submit" class="btn btn-success w-100">OK</button>
        </form>
    </div>
<?php
include "footer.php";
?>