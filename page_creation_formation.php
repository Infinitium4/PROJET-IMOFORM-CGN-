if ($_SESSION["compte"]["type_profile"] !== "contacts"){
    die("PROFIL ERROR. Vous n'avez pas les droits pour acceder a cette page");
}