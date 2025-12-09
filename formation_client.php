<?php
include "header.php";
include "navbar.php";

$req = $pdo->prepare("SELECT * FROM inscriptions  WHERE id_contact = :idUser");
$req->execute([":idUser" => $_SESSION['compte']['id']]);
$formations = $req->fetchAll();
?>

<table class="table table-stripped">
    <tr>
        <th>Titre</th>
        <th>Description</th>
        <th>Actions</th>
    </tr>
    <?php
    foreach ($formations as $formation) {
        ?>
        <tr>
            <td><?php echo $categorie["titre"] ?></td>
            <td><?php echo $categorie["description"] ?></td>
            <td>
                <a href="modifierCategorie.php?id=<?php echo $categorie["id"] ?>"
                    class="btn btn-sm btn-warning">Modifier</a>
                <a href="supprimerCategorie.php?id=<?php echo $categorie["id"] ?>"
                   class="btn btn-sm btn-danger">Supprimer</a>
                <a href="categorie.php?id=<?php echo $categorie["id"] ?>"
                   class="btn btn-sm btn-primary">voir</a>
            </td>
        </tr>
        <?php
    }
    ?>
</table>