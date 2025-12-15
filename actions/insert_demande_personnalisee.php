<?php
session_start();
$tokenServeur = $_SESSION['token'];
$tokenRecu=filter_input(INPUT_POST, 'token',FILTER_DEFAULT);
if($tokenServeur!=$tokenRecu){
    die("TOKEN ERROR");
}
if ($_SESSION["compte"]["type_profile"] !== "contacts"){
    die("PROFIL ERROR. Vous n'avez pas les droits pour acceder a cette page");
}

$id_agence = filter_input(INPUT_POST, 'id_agence', FILTER_DEFAULT);
$id_contact = filter_input(INPUT_POST, 'id_contact', FILTER_DEFAULT);
$type_conseil = filter_input(INPUT_POST, 'type_conseil', FILTER_DEFAULT);
$description = filter_input(INPUT_POST, 'description', FILTER_DEFAULT);

include "../config.php";
$pdo = new PDO('mysql:host=' . config::HOST . ';dbname=' . config::DBNAME, config::USER, config::PASSWORD);

$req = $pdo->prepare("INSERT INTO demande_conseils (`id_agence`, `id_contact`, `type_conseil`, `description`, `date_demande`, `statut`,`id_formateur`) VALUES (:id_agence,:id_contact,:type_conseil,:descriptions,:date_heure,'en attente','')");
$req->bindParam(':id_agence', $id_agence);
$req->bindParam(':id_contact', $id_contact);
$req->bindParam(':type_conseil', $type_conseil);    
$req->bindParam(':descriptions', $description);
$req->bindParam(':date_heure', $_SESSION['date_heure']);

$req->execute();

header("Location: ../index.php");