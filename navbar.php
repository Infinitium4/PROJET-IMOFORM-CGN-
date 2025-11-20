<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Chatons</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <?php
                $DossierAAnalyser = "Photos";
                $fichiers = scandir($DossierAAnalyser);
                foreach ($fichiers as $fichier) {
                    if ($fichier != "." && $fichier != "..") {
                        echo '<li class="nav-item"><a class="nav-link" href="dossier.php?d='.$fichier.'">'.$fichier.'</a></li>';
                    }
                }
                ?>
            </ul>
        </div>
    </div>
</nav>