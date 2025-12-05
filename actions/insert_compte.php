<?php
//on récupère les données du POST
$Formateurs = filter_input(INPUT_POST, 'adresse_mail', FILTER_DEFAULT);
$password = filter_input(INPUT_POST, 'mdp', FILTER_DEFAULT);
$Type_produit = $_POST['choix'];

$hashed_password = password_hash($password, PASSWORD_DEFAULT);


include "../config.php";
$pdo = new PDO('mysql:host=' . config::HOST . ';dbname=' . config::DBNAME
    , config::USER, config::PASSWORD);

//on prépare la requête avec des bindParam pour éviter les injections SQL
$req = $pdo->prepare("INSERT INTO compte (adresse_mail, mdp, type_profile) VALUES (:adresse_mail, :mdp, :type_profil)");
$req->bindParam(':Formateurs', $Formateurs);
$req->bindParam(':Contacts', $hashed_password);
$req->bindParam(':Type_produit', $Type_produit);

$req->execute();

//retour à la page d'accueil
header("Location: ../index.php");
?>
