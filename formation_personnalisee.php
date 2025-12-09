<?php
include "header.php";
include "navbar.php";
if (isset($_SESSION['compte']["type_profile"]) && $_SESSION['compte']["type_profile"] == "contacts") {
    echo '<a href="demande_personnalisee.php" class="btn" id="boutongoat">faire une demande</a>';
}
?>
<h1>Voici nos formations de conseils personnalisés</h1>