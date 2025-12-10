<?php
include "header.php";
include "navbar.php";
if (isset($_SESSION['compte']["type_profile"]) && $_SESSION['compte']["type_profile"] == "contacts") {
    echo '<a href="demande_personnalisee.php" id="boutongoat">Commander</a>';
}
?>

<div class="container mt-4">
    <div class="bulle">
        <h1>Conseils personnalisés</h1>
        <p>Immoform propose des conseils personnalisés adaptés à vos besoins. Après une demande enregistrée par votre agence, un formateur prendra en charge le suivi et vous proposera un plan d’action concret.</p>
    </div>

    <div class="bulle">
        <h2>Exemples de conseils :</h2>
        <ul>
            <li><strong>Stratégie commerciale pour booster vos ventes</strong> – Durée : 2h – Formateur : Marie Dupont – Secteur : Résidentiel</li>
            <li><strong>Optimisation marketing digital</strong> – Durée : 3h – Formateur : Jean Martin – Secteur : Commercial</li>
            <li><strong>Gestion et motivation des équipes</strong> – Durée : 2h – Formateur : Clara Bernard – Secteur : Mixte</li>
        </ul>
    </div>

    <div class="bulle">
        <img src="images/conseils-personnalises.jpg" alt="Conseils personnalisés">
    </div>
</div>

<?php
include "footer.php";
?> 