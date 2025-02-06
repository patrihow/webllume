<?php
require_once('classes/CRUD.php');
require_once('classes/Projet.php');

try {
    $projet = new Projet();
    $projects = $projet->getAllProjects();
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Patricia Bravo" />
    <meta name="description" content="Programmation web avancée en PHP" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <title>Liste des Projets</title>
</head>
<body>

<nav class="navigation">
    <ul>
    <div>
        <span class="logo">🚀 WebLlume</span>
    </div>
        <li><a href="projet-index.php">Accueil</a></li>
        <li><a href="projet-create.php">Créer un Projet</a></li>
        <li><a href="projet-show.php">Voir les Projets</a></li>
    </ul>
</nav>
<header>
    <h1>Illuminez votre talent, révélez votre potentiel</h1>
    <p>
        WebLlume est la plateforme conçue pour les étudiants du Collège
        Maisonneuve qui souhaitent donner vie à leurs projets et bâtir un
        portfolio solide dès le début de leur carrière en développement web.
    </p>
</header>

<main>
    <section class="grille">
    <?php
        if (empty($projects)) {
            echo "Aucun projet trouvé.";
        } else {
            foreach ($projects as $row) {
    ?>
            <!-- Projet -->
            <article>
                <img src="<?= $row['image'] ?>" alt="Projet" /> 
                <div>
                    <h3>Projet: <a href="projet-show.php?id=<?= $row['id'] ?>"><?= $row['titre'] ?></a></h3>
                </div>
                <div>
                    <ul>
                        <li>
                            <strong>Description</strong>:
                            <p><?= $row['description'] ?></p>
                        </li>
                        <li>
                            <strong>Année de création</strong>: <?= $row['annee_creation'] ?>
                        </li>
                        <li>
                            <strong>Lien vers le site</strong>: <a href="<?= $row['lien_site'] ?>"><?= $row['lien_site'] ?></a>
                        </li>
                        <li>
                            <strong>Catégorie</strong>: <?= $row['nom_categorie'] ?> 
                        </li>
                    </ul>
                </div>
            </article>
            <!-- Fin du projet -->
    <?php
            } // Fin du foreach
        }
    ?>       
    </section>
</main>

<footer>
    <p>WebLlume est un projet du cours <strong>Programmation web avancée</strong> avec <strong>Marcos Sanches</strong>.</p>
    <p>Conçue et codée avec ❤️ par 
        <a href="https://github.com/patrihow" target="_blank">@patrihow</a>.
    </p>
    <p>© 2024 WebLlume. Tous droits réservés.</p>
</footer>

</body>
</html>