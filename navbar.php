<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Accueil</a>
        <a class="navbar-brand d-lg-none" href="connexion.php" id="SeConnecter">Se Connecter</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <?php
                $DossierAAnalyser = "Formation";
                $fichiers = scandir($DossierAAnalyser);
                foreach ($fichiers as $fichier) {
                    if ($fichier != "." && $fichier != "..") {
                        $nom_sans_ext = pathinfo($fichier, PATHINFO_FILENAME);
                        echo '<li class="nav-item"><a class="nav-link" href="connexion.php?d='.$nom_sans_ext.'">'.$nom_sans_ext.'</a></li>';
                    }
                }
                ?>
            </ul>

            <!-- SE CONNECTER A DROITE SUR GRAND ÉCRAN -->
            <a class="navbar-brand ms-lg-auto" href="connexion.php" id="SeConnecter">Se Connecter</a>
        </div>
    </div>
</nav>