<?php
include "header.php";
include "navbar.php";

if ($_SESSION["compte"]["type_profile"] !== "formateurs"){
    die("PROFIL ERROR. Vous n'avez pas les droits pour acceder a cette page");
}

$req=$pdo->prepare("SELECT nom, prenom, id FROM formateurs");
$req->execute();
$formateurs = $req->fetchAll(PDO::FETCH_ASSOC);
$id_demande = filter_input(INPUT_POST, 'id_demande',FILTER_VALIDATE_INT);
?>

<div class="form-box">
    <form action="insert_F_ligne" method="post" class="mt-3">
    <h3>Créeer une formation en ligne :</h3>
        <div class="mb-3">
            <label class="form-label" for="titre">Titre</label>
            <input name="titre" type="text" maxlength="65" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label" for="description">Description</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label" for="duree">duree</label>            
            <select name="duree"  class="form-select" required>
                <option value="" disabled selected>— Choisir une durée —</option>';
                <?php
                for ($i = 1; $i <= 10; $i++) {
                    echo '<option value='.$i.'>'.$i.'h</option>';
                }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label" for="date_heure">Jour et Heure</label>
            <input name="date_heure" type="datetime-local" class="form-control" required>
            <?php
            if(isset($_SESSION["errorDate"])){
                echo '<div class="errormessages">'.$_SESSION["errorDate"].'</div>';
            }
            ?>
        </div>

        <div class="mb-3">
            <label class="form-label" for="montant">Cout de la formation (€)</label>
            <input name="cout" type="number" class="form-control" min="0" step="0.01" placeholder="0,00 €" required>
        </div>

        <div class="mb-3">
            <label class="form-label" for="commentaire">Commentaire</label>
            <textarea name="commentaire" class="form-control"></textarea>
        </div>
        
        <div class="mb-3">
            <label class="form-label" for="lien">Lien </label>
            <input name="lien" type="url" class="form-control" placeholder="https://exemple.com">
        </div>

        <div class="mb-3">
            <label class="form-label">Adresse</label>
            <div class="d-flex gap-2">
                <input name="adresse" type="text" class="form-control" placeholder="Rue" required>
                <input name="ville" type="text" class="form-control" placeholder="Ville" required>
                <input name="code_postal" type="text" class="form-control" placeholder="Code postal" required>
            </div>
        </div>
       
        <div class="mb-3 d-flex align-items-end gap-2">
            <div class="flex-grow-1">
                <label>Formateur :</label>
                <select name="id_formateur[]" class="form-select" required>
                    <option value="" disabled selected>— Choisir un formateur —</option>
                    <?php
                    foreach ($formateurs as $formateur) {
                        echo '<option value="'.$formateur["id"].'">'.$formateur["nom"].' '.$formateur["prenom"].'</option>';
                    }
                    ?>
                </select>
            </div>
        </div>


        <input type="hidden" name="token" value="<?= $token ?>">
        <input type="hidden" name="id_demande" value="<?= $id_demande ?>">
        
        <div class="d-flex justify-content-center gap-3">
            <button type="submit" formaction="actions/insert_F_conseil.php" class="btn btn-success w-50" >Envoyer</button>
            <a class="btn btn-secondary w-50" href="page_gestion_formations.php" role="button">Retour</a>
        </div>
    </form>
    <?php 
    $_SESSION["errorNBformateur"]="";
    $_SESSION["errorDate"]="";
    ?>
</div> 