<?php
include "header.php";
include "navbar.php";
if (isset($_SESSION['compte']["type_profile"])=="contacts"){
    echo '<a href="demande_F_standard.php" class="btn" id="boutongoat">faire une demande</a>';
}
?>