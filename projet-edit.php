<?php
require_once('classes/CRUD.php');
require_once('classes/Projet.php');

$projet = new Projet();
$project = $projet->getProjectById($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'titre' => $_POST['titre'],
        'description' => $_POST['description'],
        'annee_creation' => $_POST['annee_creation'],
        'lien_site' => $_POST['lien_site'],
        'image' => $_FILES[' image']['name'] ? $_FILES['image']['name'] : $project['image'], 
        'user_id' => $project['user_id'],
        'categorie_id' => $_POST['categorie_id']
    ];

    $projet->updateProject($data, $_GET['id']);

    if ($_FILES['image']['name']) {
        move_uploaded_file($_FILES['image']['tmp_name'], "assets/uploads/" . $_FILES['image']['name']);
    }

    header("Location: projet-show.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Patricia Bravo">
    <meta name="description" content="Programmation web avancée en PHP">
    <!-- Typographie Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/main.css">
    <title>Modifier le Projet</title>
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
    <section class="grille">
        <section class="form-section">
            <header class="form-header">
                <h1 class="form-title">Modifier le Projet</h1>
            </header>
            <form action="submit_projet.php" method="POST" enctype="multipart/form-data" class="project-form">
                <div class="form-group">
                    <label for="titre" class="form-label">Titre du Projet
                    </label>
                    <input type="text" id="titre" name="titre" required aria-required="true" placeholder="Entrez le titre du projet" class="form-input" value="<?= $project['titre'] ?>">
                </div>

                <div class="form-group">
                    <label for="description" class="form-label">Description 
                    </label>
                    <textarea id="description" name="description" required aria-required="true" placeholder="Entrez la description du projet" class="form-textarea"><?= $project['description'] ?></textarea>
                </div>

                <div class="form-group">
                    <label for="annee_creation" class="form-label">Année de Création</label>
                    <input type="number" id="annee_creation" name="annee_creation" required aria-required="true" placeholder="Entrez l'année de création" min="1900" max="2100" class="form-input" value="<?= $project['annee_creation'] ?>">
                </div>

                <div class="form-group">
                    <label for="categorie_id" class="form-label">Catégorie 
                    </label>
                    <select id="categorie_id" name="categorie_id" required aria-required="true" class="form-select">
                        <option value="" disabled selected>Choisissez une catégorie</option>
                        <option value="1" <?= $project['categorie_id'] == 1 ? 'selected' : '' ?>>Vitrine</option>
                        <option value="2" <?= $project['categorie_id'] == 2 ? 'selected' : '' ?>>Page d’atterrissage</option>
                        <option value="3" <?= $project['categorie_id'] == 3 ? 'selected' : '' ?>>Transactionnel</option>
                        <option value="4" <?= $project['categorie_id'] == 4 ? 'selected' : '' ?>>Boutique en ligne</option>
                        <option value="5" <?= $project['categorie_id'] == 5 ? 'selected' : '' ?>>Application web</option>
                        <option value="6" <?= $project['categorie_id'] == 6 ? 'selected' : '' ?>>Blogue</option>
                        <option value="7" <?= $project['categorie_id'] == 7 ? 'selected' : '' ?>>Portfolio</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="lien_site" class="form-label">Lien du Site 
                    </label>
                    <input type="url" id="lien_site" name="lien_site" required aria-required="true" placeholder="Entrez le lien du site" class="form-input" value="<?= $project['lien_site'] ?>">
                </div>

                <div class="form-group">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" id="image" name="image" accept="image/*" required aria-required="true" class="form-input">
                    <small class="form-note">Formats acceptés : JPG, PNG.</small>
                </div>

                <div class="form-group">
                    <button type="submit" class="form-button" name="nouvelleProduction" value="Publier">Mettre à jour</button>
                </div>
            </form>
            <div><a href="projet-show.php">Afficher mes projets</a></div>
        </section>
    </main>
</body>
</html>