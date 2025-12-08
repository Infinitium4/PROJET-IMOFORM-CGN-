<?php
session_start();
$tokenServeur = $_SESSION['token'];
$tokenRecu = filter_input(INPUT_POST, 'token',FILTER_DEFAULT);

if ($tokenServeur != $tokenRecu){
    die("TOKEN ERROR");
}

include "../config.php";
$pdo = new PDO("mysql:host=" . config::HOST . ";dbname=" . config::DBNAME, config::USER, config::PASSWORD);

$mail = filter_input(INPUT_POST, 'adresse_mail', FILTER_DEFAULT);
$mdp = filter_input(INPUT_POST, 'mdp', FILTER_DEFAULT);

$req = $pdo->prepare("SELECT * FROM compte WHERE adresse_mail=:mail");
$req->bindParam(':mail', $mail);
$req->execute();
$compte = $req->fetch(PDO::FETCH_ASSOC);

if($compte===false){
    echo "<script>alert('adresse mail inccorect');</script>";
    header("Location: page_connexion.php");
    exit();
}
else{
    if(password_verify($mdp, $compte['mdp'])){
        header("Location: index.php");
        exit();
    }
    else{
        header("Location: page_connexion.php");
        exit();
    }
}
?>