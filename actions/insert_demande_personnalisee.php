<?php
session_start();
$tokenServeur = $_SESSION['token'];
$tokenRecu=filter_input(INPUT_POST, 'token',FILTER_DEFAULT);
if($tokenServeur!=$tokenRecu){
    die("TOKEN ERROR");
}

$id_agence = filter_input(INPUT_POST, 'agence', FILTER_DEFAULT);
$id_contact = filter_input(INPUT_POST, 'id_contact', FILTER_DEFAULT);
$type_connseil = filter_input(INPUT_POST, 'type_connseil', FILTER_DEFAULT);
$description = filter_input(INPUT_POST, 'description', FILTER_DEFAULT);

include "../config.php";
$pdo = new PDO('mysql:host=' . config::HOST . ';dbname=' . config::DBNAME, config::USER, config::PASSWORD);

$req = $pdo->prepare("INSERT INTO demande_conseils (`id_agence`, `id_contact`, `type_conseil`, `description`, `date_demande`, `statut`,'id_formateur') VALUES (':id_agence',':id_contact',':type_conseil',':description',':date_heure','en attente','')");
$req->bindParam(':id_agence', $id_agence);
$req->bindParam(':description', $id_contact);
$req->bindParam(':type_contact', $type_contact);
$req->bindParam(':description', $description);
$req->bindParam(':date_heure', $_SESSION['date_heure']);

$req->execute();

header("Location: ../index.php");