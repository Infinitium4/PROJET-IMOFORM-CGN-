<?php
session_start();
$token=random_int(0,10000000);
$_SESSION['token']=$token;
$_SESSION['date_heure']=date("Y-m-d H:i:s");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Immoform</title>
</head>
<body>

<?php
include_once "config.php";
$pdo = new PDO("mysql:host=". config::HOST . ";dbname=". config::DBNAME, config::USER, config::PASSWORD);

if (isset($_SESSION['compte']["type_profile"]) && $_SESSION['compte']["type_profile"] == "contacts"){
    if (!isset($_SESSION["compte"]["agences"])) {
        $_SESSION["compte"]["agences"] = [];
    }

    $req = $pdo->prepare("SELECT a.adherent, a.id, a.nom FROM agences a JOIN travail t ON t.id_agence=a.id WHERE t.id_contact=:id_client");
    $req->bindParam(':id_client', $_SESSION["compte"]["id_utilisateur"]);
    $req->execute();
    $agences = $req->fetchAll(PDO::FETCH_ASSOC);

    $listeNoms = array_column($_SESSION["compte"]["agences"], "nom");
    foreach($agences as $agence){
        if(!in_array($agence["nom"], $listeNoms)){
            $_SESSION["compte"]["agences"][]=$agence;
            $listeNoms[] = $agence["nom"];
        }
    }
}

?>