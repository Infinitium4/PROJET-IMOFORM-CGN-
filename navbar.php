<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">

    <a class="navbar-brand d-flex align-items-center" href="index.php">
        <img src="media/logo01.png" id="logo-small" style="margin-right: 8px;">
        Accueil
    </a>


        <!-- Bouton mobile -->
        <a class="navbar-brand d-lg-none" href="page_connexion.php" id="SeConnecter">Se Connecter</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <?php
                $fichiers = scandir(__DIR__);
                foreach ($fichiers as $fichier) {
                    if ($fichier != "." && $fichier != "..") {
                        // Vérifie que le fichier commence par "formation_"
                        if (strpos($fichier, "formation_") === 0) {
                            $nom_sans_ext = pathinfo($fichier, PATHINFO_FILENAME);
                            $nom_final = substr($nom_sans_ext, strlen("formation_"));
                            echo '<li class="nav-item"><a class="nav-link" href="'.$fichier.'">'.$nom_final.'</a></li>';
                        }
                    }
                }
                ?>
            </ul>
            <!-- SE CONNECTER A DROITE SUR GRAND ÉCRAN -->
            <a class="navbar-brand ms-lg-auto d-none d-lg-block btn btn-primary" href="page_connexion.php">Se Connecter</a>
        </div>
    </div>
</nav>