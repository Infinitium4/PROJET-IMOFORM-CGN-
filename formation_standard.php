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
        <h2>Exemples de sessions :</h2>
        <ul>
            <li><strong>Techniques de négociation immobilière</strong> – Durée : 6h – Niveau : Intermédiaire – Secteur : Résidentiel</li>
            <li><strong>Optimisation des transactions commerciales</strong> – Durée : 8h – Niveau : Avancé – Secteur : Commercial</li>
            <li><strong>Développement d’équipe et gestion RH</strong> – Durée : 4h – Niveau : Débutant – Secteur : Mixte</li>
        </ul>
    </div>

    <div class="bulle">
        <p>Chaque formation inclut le matériel nécessaire et des supports pour révision après la session.</p>
        <img src="images/formation-presentiel.jpg" alt="Formation présentiel">
    </div>
</div>

<?php
include "footer.php";
?> 