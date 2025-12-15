<?php
include "header.php";
include "navbar.php";
?>

<div class="form-box">
    <h3>Formation</h3>
    <form action="actions/insert_demande_personnalisee.php" method="post" class="mt-3">
        <div class="mb-3">
            <label for="couleur">Agence :</label>
            <select name="id_agence" id="id_agence">
            <?php
            foreach($_SESSION["compte"]["agences"] as $agence){
                    echo '<option value="'.$agence["id"].'">'.$agence["nom"].'</option>';
                }
            ?>
            </select>
        </div>

        <input type="hidden" name="id_contact" value="<?= $_SESSION["compte"]["id_utilisateur"]; ?>">

        <div class="mb-3">
            <label class="form-label" for="titre">Type de conseil :</label>
            <input id="type_conseil" type="text" required maxlength="65" name="type_conseil" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label" for="description">Description</label>
            <textarea id="description" name="description" class="form-control" rows="4"></textarea>
        </div>

        <input type="hidden" name="token" value="<?= $token ?>">

        <button type="submit" class="btn btn-success w-100">envoyer</button>
    </form>
</div>
