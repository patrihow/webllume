<?php
require_once('classes/CRUD.php');
require_once('classes/Projet.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $data = [
        'titre' => $_POST['titre'],
        'description' => $_POST['description'],
        'annee_creation' => $_POST['annee_creation'],
        'lien_site' => $_POST['lien_site'],
        'image' => $_FILES['image']['name'], 
        'user_id' => 2, 
        'categorie_id' => $_POST['categorie_id']
    ];

    $projet = new Projet();
    $projetId = $projet->createProject($data); 

    if ($projetId) {
        
        move_uploaded_file($_FILES['image']['tmp_name'], "assets/uploads/" . $_FILES['image']['name']);
        header("Location: projet-show.php"); 
        exit();
    } else {
        echo "Erreur lors de la création du projet.";
    }
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
    <title>Ajouter un Nouveau Projet</title>
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
                <h1 class="form-title">Ajouter un Nouveau Projet</h1>
            </header>
            <form action="" method="POST" enctype="multipart/form-data" class="project-form">
                <div class="form-group">
                    <label for="titre" class="form-label">Titre du Projet</label>
                    <input type="text" id="titre" name="titre" required aria-required="true" placeholder="Entrez le titre du projet" class="form-input">
                </div>

                <div class="form-group">
                    <label for="description" class="form-label">Description</label>
                    <textarea id="description" name="description" required aria-required="true" placeholder="Entrez la description du projet" class="form-textarea"></textarea>
                </div>

                <div class="form-group">
                    <label for="annee_creation" class="form-label">Année de Création</label>
                    <input type="number" id="annee_creation" name="annee_creation" required aria-required="true" placeholder="Entrez l'année de création" min="1900" max="2100" class="form-input">
                </div>

                <div class="form-group">
                    <label for="categorie_id" class="form-label">Catégorie</label>
                    <select id="categorie_id" name="categorie_id" required aria-required="true" class="form-select">
                        <option value="" disabled selected>Choisissez une catégorie</option>
                        <option value="1">Vitrine</option>
                        <option value="2">Page d’atterrissage</option>
                        <option value="3">Transactionnel</option>
                        <option value="4">Boutique en ligne</option>
                        <option value="5">Application web</option>
                        <option value="6">Blogue</option>
                        <option value="7">Portfolio</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="lien_site" class="form-label">Lien du Site</label>
                    <input type="url" id="lien_site" name="lien_site" required aria-required="true" placeholder="Entrez le lien du site" class="form-input">
                </div>

                <div class="form-group">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" id="image" name="image" accept="image/*" required aria-required="true" class="form-input">
                    <small class="form-note">Formats acceptés : JPG, PNG.</small>
                </div>

                <div class="form-group">
                    <button type="submit" class="form-button" name="nouvelleProduction" value="Publier">Publier</button>
                </div>
            </form>
            <div><a href="projet-show.php">Afficher mes projets</a></div>
        </section>
    </main>
</body>
</html>