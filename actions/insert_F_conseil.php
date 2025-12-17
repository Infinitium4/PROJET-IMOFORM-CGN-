<?php
session_start();
$tokenServeur = $_SESSION['token'];
$tokenRecu = filter_input(INPUT_POST, 'token',FILTER_DEFAULT);
$_SESSION["errorNBformateur"]="";

if ($tokenServeur != $tokenRecu){
    die("TOKEN ERROR");
}
if ($_SESSION["compte"]["type_profile"] !== "formateurs"){
    die("PROFIL ERROR. Vous n'avez pas les droits pour acceder a cette page");
}

$titre = filter_input(INPUT_POST, 'titre', FILTER_DEFAULT);
$description = filter_input(INPUT_POST, 'description', FILTER_DEFAULT);
$duree = filter_input(INPUT_POST, 'duree', FILTER_VALIDATE_INT);
$date_heure = filter_input(INPUT_POST, 'date_heure', FILTER_DEFAULT);
$cout = filter_input(INPUT_POST, 'cout', FILTER_VALIDATE_INT);
$commentaire = filter_input(INPUT_POST, 'commentaire', FILTER_DEFAULT);
$lien = filter_input(INPUT_POST, 'lien', FILTER_DEFAULT);
$adresse = filter_input(INPUT_POST, 'adresse', FILTER_DEFAULT);
$ville = filter_input(INPUT_POST, 'ville', FILTER_DEFAULT);
$code_postal = filter_input(INPUT_POST, 'code_postal', FILTER_VALIDATE_INT);
$formateurs = filter_input(INPUT_POST, 'id_formateur', FILTER_DEFAULT, ['flags' => FILTER_REQUIRE_ARRAY]);
$formateurs = array_unique($formateurs);
$id_demande = filter_input(INPUT_POST, 'id_demande', FILTER_VALIDATE_INT);

include "../config.php";
$pdo = new PDO('mysql:host=' . config::HOST . ';dbname=' . config::DBNAME, config::USER, config::PASSWORD);

$req = $pdo->prepare("INSERT INTO `formations_personnalises`(`titre`, `description`, `duree`, `date_heure`, `cout_formation`, `commentaire`, `liens`, `id_demande`, `adresse`, `ville`, `code_postal`) VALUES (:titre, :description, :duree, :date_heure, :cout_formation, :commentaire, :liens, :id_demande, :adresse, :ville, :code_postal)");
$req->bindParam(':titre', $titre);
$req->bindParam(':description', $description);
$req->bindParam(':duree', $duree);
$req->bindParam(':date_heure', $date_heure);
$req->bindParam(':cout_formation', $cout);
$req->bindParam(':commentaire', $commentaire);
$req->bindParam(':id_demande', $id_demande);
$req->bindParam(':liens', $lien);
$req->bindParam(':id_demande', $id_demande);
$req->bindParam(':adresse', $adresse);
$req->bindParam(':ville', $ville);
$req->bindParam(':code_postal', $code_postal);

$req->execute();

$id_formation= $pdo->lastInsertId();

foreach($formateurs as $formateur){
    $req = $pdo->prepare("INSERT INTO formateurs_assignes (`type_formation`, `id_formation`, `id_formateur`) VALUES ('formations_personnalises',:id_formation,:id_formateur)");
    $req->bindParam(':id_formation', $id_formation);
    $req->bindParam(':id_formateur', $formateur);
    $req->execute();
}

$req = $pdo->prepare("UPDATE demande_conseils SET `statut`='termine' WHERE id=:id_formation");
$req->bindParam(':id_formation', $id_demande);
$req->execute();

header("Location: ../page_gestion_formations.php");
?>