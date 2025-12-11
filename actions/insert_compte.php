<?php
session_start();
$tokenServeur = $_SESSION['token'];
$tokenRecu=filter_input(INPUT_POST, 'token',FILTER_DEFAULT);

if($tokenServeur!=$tokenRecu){
    die("TOKEN ERROR");
}

$adresse_mail = filter_input(INPUT_POST, 'adresse_mail', FILTER_VALIDATE_EMAIL);
$password = filter_input(INPUT_POST, 'mdp', FILTER_DEFAULT);
$type_profil = filter_input(INPUT_POST, 'choix', FILTER_DEFAULT);

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

include "../config.php";
$pdo = new PDO('mysql:host=' . config::HOST . ';dbname=' . config::DBNAME, config::USER, config::PASSWORD);

$req = $pdo->prepare("SELECT COUNT(*) FROM compte WHERE adresse_mail = :mail");
$req->bindParam(':mail', $adresse_mail);
$req->execute();
$exists = $req->fetchColumn();

if ($exists > 0) {
    $_SESSION["AdresseErrorMessage"] = "Cette adresse mail n'est pas disponible";
    header("Location: ../page_creation.php");
    exit;
}else{
    $tables_valides = ['formateurs', 'contacts'];

    if (!in_array($type_profil, $tables_valides)) {
        $_SESSION["AdresseErrorMessage"] = "Type de profil invalide";
        header("Location: ../page_creation.php");
        exit;
    }

    $req = $pdo->prepare("SELECT id FROM $type_profil WHERE adresse_mail=:mail");
    $req->bindParam(':mail',$adresse_mail);
    $req->execute();
    $id_utilisateur = $req->fetchColumn();

    if(!$id_utilisateur){
        $_SESSION["AdresseErrorMessage"] = "Cette adresse mail n'appartient pas à une agence ou à notre centre";
        header("Location: ../page_creation.php");
        exit;
    }else{
        $req = $pdo->prepare("INSERT INTO compte (id_utilisateur, adresse_mail, mdp, type_profile) VALUES (:id, :adresse_mail, :mdp, :type_profile)");
        $req->bindParam(':id', $id_utilisateur);
        $req->bindParam(':adresse_mail', $adresse_mail);
        $req->bindParam(':mdp', $hashed_password);
        $req->bindParam(':type_profile', $type_profil);
        $req->execute();
        header("Location: ../index.php");
        exit;
    }    
}
?>