<?php
include "header.php";
include "navbar.php";
if (isset($_SESSION['compte']["type_profile"]) && $_SESSION['compte']["type_profile"] == "contacts") {
    echo '<a href="demande_personnalisee.php" id="bouton">Commander</a>';
}
?>

<div class="container mt-4">
<div class="bulle">
    <h1>Conseils personnalisés</h1>
    <p>Chez <strong>Immoform</strong>, nous comprenons que chaque agence immobilière a ses propres besoins et objectifs. Nos conseils personnalisés sont conçus pour apporter un soutien concret et stratégique, afin d'optimiser vos performances commerciales, renforcer vos équipes et améliorer votre visibilité sur le marché. Après la réception de votre demande, un formateur expérimenté prendra en charge votre suivi et vous proposera un plan d'action sur mesure.</p>
</div>

<div class="bulle">
    <h2>Pourquoi choisir nos conseils personnalisés ?</h2>
    <ul>
        <li><strong>Analyse sur mesure :</strong> Nous étudions votre agence, votre secteur et vos besoins spécifiques pour vous proposer des recommandations adaptées.</li>
        <li><strong>Formateurs experts :</strong> Nos formateurs possèdent une expérience solide dans le domaine immobilier et vous accompagnent tout au long du processus.</li>
        <li><strong>Plan d'action concret :</strong> Chaque conseil est accompagné d'un plan d'action précis, avec des objectifs mesurables et un suivi personnalisé.</li>
        <li><strong>Flexibilité :</strong> Nos conseils peuvent se dérouler à distance ou directement dans vos locaux, selon vos préférences et vos contraintes.</li>
        <li><strong>Suivi et support :</strong> Après le conseil, nous restons disponibles pour toute question ou ajustement nécessaire.</li>
    </ul>
</div>

<div class="bulle">
    <h2>Comment ça fonctionne ?</h2>
    <p>1. Vous soumettez votre demande via notre formulaire de conseils personnalisés disponnible en bas a droite de votre écrant.<br>
       2. Un formateur prend en charge votre demande et analyse votre agence.<br>
       3. Vous recevez un plan d'action personnalisé, avec recommandations et supports.<br>
       4. Vous pouvez planifier un suivi pour ajuster et optimiser les solutions proposées.</p>
</div>

<div class="bulle">
    <img src="media/conseilsPersonnalises.png" alt="Conseils personnalisés">
</div>
</div>

<?php
include "footer.php";
?> 