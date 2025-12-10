<?php
//verification des tokens pour éviter le spam des requetes, tu peux copier/coller
session_start();
$tokenServeur = $_SESSION['token'];
$tokenRecu=filter_input(INPUT_POST, 'token',FILTER_DEFAULT);
if($tokenServeur!=$tokenRecu){
    die("TOKEN ERROR");
}

//tu récuperes les infos envoyé dans le formulaire de la page associé
$titre = filter_input(INPUT_POST, 'adresse_mail', FILTER_DEFAULT);
$description = filter_input(INPUT_POST, 'mdp', FILTER_DEFAULT);
$commentaire = filter_input(INPUT_POST, 'choix', FILTER_DEFAULT);

//preparation pour la requete sql
include "../config.php";
$pdo = new PDO('mysql:host=' . config::HOST . ';dbname=' . config::DBNAME, config::USER, config::PASSWORD);

//requete sql a adapter
$req = $pdo->prepare("INSERT INTO compte (id_utilisateur, adresse_mail, mdp, type_profile) VALUES (:id, :adresse_mail, :mdp, :type_profile)");
$req->bindParam(':titre', $titre);
$req->bindParam(':description', $description);
$req->bindParam(':commentaire', $commentaire);

$req->execute();

header("Location: ../index.php");