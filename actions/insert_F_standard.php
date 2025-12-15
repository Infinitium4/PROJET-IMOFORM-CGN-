<?php
session_start();
$tokenServeur = $_SESSION['token'];
$tokenRecu = filter_input(INPUT_POST, 'token',FILTER_DEFAULT);

if ($tokenServeur != $tokenRecu){
    die("TOKEN ERROR");
}
if ($_SESSION["compte"]["type_profile"] !== "formateurs"){
    die("PROFIL ERROR. Vous n'avez pas les droits pour acceder a cette page");
}