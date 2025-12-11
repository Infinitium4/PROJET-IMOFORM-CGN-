<?php
include "header.php";
include "navbar.php";
if (isset($_SESSION['compte']["type_profile"]) && $_SESSION['compte']["type_profile"] == "contacts") {
    echo '<a href="demande_F_standard.php" id="boutongoat">Commander</a>';
}
?>

<div class="container mt-4">
    <div class="bulle">
        <h1>Formations en présentiel</h1>
        <p>Participez à nos sessions interactives dans des lieux adaptés, animées par des formateurs experts avec plusieurs années d’expérience.</p>
    </div>

    <div class="bulle">
        <p>Chaque formation inclut le matériel nécessaire et des supports pour révision après la session.</p>
        <img src="media/formationStandard.png" alt="Formation présentiel">
    </div>

    <div class="bulle">
        <h2>Nos prochaines formations standard :</h2>
        <ul>
            <li><strong>titre</strong> - Description : x - Durée : x - Niveau : x - Secteur : x - Date et Heure : x x - Formateur : x </li>
        </ul>
    </div>

</div>

<?php
include "footer.php";
?> 