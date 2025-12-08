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

if(!$compte){
    echo "<script>alert('adresse mail inccorect');</script>";
    //header("Location: ../page_connexion.php");
}
//password_verify($mdp, $compte['mdp']
else{
    if($compte['mdp']==$mdp){
        $_SESSION["compte"]=$compte;
        header("Location: ../index.php");
    }
    else{
        echo "<script>alert('mdp inccorect');</script>";
        //header("Location: ../page_connexion.php");
    }
}
?>