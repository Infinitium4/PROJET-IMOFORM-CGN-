<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">

    <a class="navbar-brand d-flex align-items-center" href="index.php">
        <img src="media/logo01.png" id="logo-small" style="margin-right: 8px;">
        Accueil
    </a>
        <a class="navbar-brand d-lg-none" href="connexion.php" id="SeConnecter">Se Connecter</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <?php
                $fichiers = scandir(__DIR__);
                foreach ($fichiers as $fichier) {
                    if ($fichier != "." && $fichier != "..") {
                        if (strpos($fichier, "formation_") === 0) {
                            $nom_sans_ext = pathinfo($fichier, PATHINFO_FILENAME);
                            $nom_sf = substr($nom_sans_ext, strlen("formation_"));
                            $nom_final = str_replace("_", " ", $nom_sf);
                            echo '<li class="nav-item"><a class="nav-link" href="'.$fichier.'">'.$nom_final.'</a></li>';
                        }
                    }
                }
                if (isset($_SESSION["compte"]["type_profile"])) {
                    if ($_SESSION["compte"]["type_profile"] === "contacts") {
                        echo '<li class="nav-item"><a class="nav-link" href="profil_client.php">Mes formations</a></li>';
                    }
                    elseif ($_SESSION["compte"]["type_profile"] === "formateurs") {
                        echo '<li class="nav-item"><a class="nav-link" href="profil_formateur.php">Gestionnaire réservations</a></li>';
                    }
                }
                ?>
            </ul>
            <?php
            if(isset($_SESSION["compte"]["adresse_mail"])){
                echo '<a class="navbar-brand ms-lg-auto d-none d-lg-block btn btn-dark" href="page_deconnexion.php">Se déconnecter</a>';
            }else{
                echo '<a class="navbar-brand ms-lg-auto d-none d-lg-block btn btn-info" href="page_connexion.php">Connexion</a>';
            }
            ?>
                   
        </div>
    </div>
</nav>