<?php
include "header.php";
include "navbar.php";

if ($_SESSION["compte"]["type_profile"] !== "formateurs"){
    die("PROFIL ERROR. Vous n'avez pas les droits pour acceder a cette page");
}
?>

<div class="d-flex">
    <!-- SIDEBAR -->
    <nav class="sidebar bg-dark text-white p-3">
        <h5 class="text-center mb-4">Menu</h5>

        <ul class="nav nav-pills flex-column gap-2">
            <li class="nav-item">
                <a href="#" class="nav-link text-white active">Dashboard</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-white">Formations</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-white">Formateurs</a>
            </li>
        </ul>
    </nav>
</div>