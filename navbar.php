<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Accueil</a>

        <!-- Bouton mobile -->
        <a class="navbar-brand d-lg-none" href="connexion.php" id="SeConnecter">Se Connecter</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
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
                        echo '<li class="nav-item"><a class="nav-link" href="Formation/'.$nom_sans_ext.'.php">'.$nom_sans_ext.'</a></li>';
                    }
                }
                ?>
            </ul>

            <!-- SE CONNECTER A DROITE SUR GRAND ÉCRAN -->
            <a class="navbar-brand ms-lg-auto d-none d-lg-block btn btn-primary" href="connexion.php">Se Connecter</a>
        </div>
    </div>
</nav>
#SeConnecter{
    margin-left: auto;
}

.center{
    text-align: center;
}