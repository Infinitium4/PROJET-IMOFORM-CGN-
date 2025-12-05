<?php
include "header.php";
include "navbar.php";
?>
<?php
$afficherBouton = true; // true si tu veux que le bouton apparaisse
?>

<?php if ($afficherBouton): ?>
    <a href="demande_F_ligne.php" class="btn" id="boutonRecurante">faire une demande</a>
<?php endif; ?>