<?php
session_start();
$tokenServeur = $_SESSION['token'];
$tokenRecu = filter_input(INPUT_POST, 'token',FILTER_DEFAULT);

if ($tokenServeur != $tokenRecu){
    die("TOKEN ERROR");
}
if ($_SESSION["compte"]["type_profile"] !== "formateurs"){
    die("PROFIL ERROR. Vous n'avez pas les droits pour acceder a cette page");
}

include "../config.php";
$pdo = new PDO("mysql:host=" . config::HOST . ";dbname=" . config::DBNAME, config::USER, config::PASSWORD);

$id_formation = filter_input(INPUT_POST, 'id_formation', FILTER_DEFAULT);
$id_formateur = filter_input(INPUT_POST, 'id_formateur', FILTER_DEFAULT);

$req = $pdo->prepare("UPDATE demande_conseils SET `statut`='termine',`id_formateur`=:id_formateur WHERE id=:id_formation");
$req->bindParam(':id_formation', $id_formation);
$req->bindParam(':id_formateur', $id_formateur);
$req->execute();

header("Location: ../page_gestion_formations.php");
?>