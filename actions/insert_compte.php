<?php
//on récupère les données du POST
$Formateurs = filter_input(INPUT_POST, 'adresse_mail', FILTER_VALIDATE_EMAIL);
$password = filter_input(INPUT_POST, 'mdp', FILTER_DEFAULT);
$Type_profil = filter_input(INPUT_POST, 'choix', FILTER_DEFAULT);


$hashed_password = password_hash($password, PASSWORD_DEFAULT);


include "../config.php";
$pdo = new PDO('mysql:host=' . config::HOST . ';dbname=' . config::DBNAME
    , config::USER, config::PASSWORD);

//on prépare la requête avec des bindParam pour éviter les injections SQL
$req = $pdo->prepare("INSERT INTO compte (adresse_mail, mdp, type_profile) VALUES (:adresse_mail, :mdp, :type_profile)");
$req->bindParam(':adresse_mail', $Formateurs);
$req->bindParam(':mdp', $hashed_password);
$req->bindParam(':type_profile', $Type_profil);

var_dump($Formateurs,$hashed_password,$Type_profil);

$req->execute();

//retour à la page d'accueil
header("Location: ../index.php");
?>
