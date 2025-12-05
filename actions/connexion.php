<?php
session_start();
$tokenServeur = $_SESSION['token'];
$tokenRecu = filter_input(INPUT_POST, 'token',FILTER_DEFAULT);

if ($tokenServeur != $tokenRecu){
    die("TOKEN ERROR. Va mourir vilain hacker");
}

$mail = filter_input(INPUT_POST, 'adresse_mail', FILTER_DEFAULT);
$mdp = filter_input(INPUT_POST, 'mdp', FILTER_DEFAULT);
$hashed_mdp = password_hash($mdp, PASSWORD_DEFAULT);

//on prépare la requête avec des bindParam pour éviter les injections SQL
$req = $pdo->prepare("");
$req->bindParam(':nom', $nom);
$req->execute();

//retour à la page d'accueil
header("Location: ../categorie.php?d=".$id_categorie);
?>

$_SESSION["adresse_utilisateur"]