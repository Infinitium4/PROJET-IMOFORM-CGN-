<?php
include "header.php";
include "navbar.php";
?>

<div class="form-box">
    <h3>Formation</h3>
    <form action="actions/" method="post" class="mt-3">

        <div class="mb-3">
            <label class="form-label" for="titre">Titre</label>
            <input type="text" id="titre" name="titre" required maxlength="65" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label" for="description">Description</label>
            <textarea id="description" name="description" class="form-control" rows="5"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label" for="secteur_concerne">Secteur concerné</label>
            <input id="secteur_concerne" name="secteur_concerne" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label" for="niveau">Niveau</label>
            <input id="niveau" name="niveau" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Durée</label>
            <div class="d-flex gap-2">
                <input type="number" id="heures" name="heures" class="form-control" placeholder="Heures" min="0">
                <input type="number" id="minutes" name="minutes" class="form-control" placeholder="Minutes" min="0" max="59">
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label" for="date_debut">Date & Heure (début)</label>
            <input id="date_debut" type="datetime-local" name="date_debut" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label" for="date_fin">Date & Heure (fin)</label>
            <input id="date_fin" type="datetime-local" name="date_fin" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label" for="adresse">Adresse</label>
            <input id="adresse" name="adresse" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label" for="ville">Ville</label>
            <input id="ville" name="ville" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label" for="code_postal">Code postal</label>
            <input id="code_postal" name="code_postal" maxlength="11" class="form-control" placeholder="Ex : 75001">
        </div>

        <div class="mb-3">
            <label class="form-label" for="capacite_accueil">Capacité d’accueil</label>
            <input id="capacite_accueil" name="capacite_accueil" type="number" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label" for="materiel">Matériel</label>
            <input id="materiel" name="materiel" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label" for="cout_formation">Coût formation (€)</label>
            <input type="number" name="cout_formation" class="form-control" min="0" step="0.01" placeholder="EX : 1000€">

        </div>

        <div class="mb-3">
            <label class="form-label" for="modalites_inscription">Modalités d'inscription</label>
            <input id="modalites_inscription" name="modalites_inscription" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label" for="commentaire">Commentaires</label>
            <textarea id="commentaire" name="commentaire" class="form-control" rows="4"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label" for="lien_connexion">Lien connexion</label>
            <input id="lien_connexion" name="lien_connexion" class="form-control" placeholder="Ex : https://immoform.com/lien">
        </div>

        <input type="hidden" name="token" value="<?php echo $token; ?>">

        <button type="submit" class="btn btn-success w-100">envoyer</button>
    </form>
</div>
