<?php
require_once('classes/CRUD.php');
require_once('classes/Projet.php');

$projet = new Projet();

$projects = $projet->getAllProjects();
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
    <h1>Liste de mes projets</h1>
    <a href="projet-create.php">Ajouter un Nouveau Projet</a>
</header>

<main>
    <section class="grille">

    <table>
        <tr>
        <th>Titre</th>
        <th>Description</th>
        <th>Année de Création</th>
        <th>Lien du Site</th>
        <th>Catégorie</th>
        <th>Actions</th>
        </tr>
        </thead>
            <tbody>
                <?php if (empty($projects)): ?>
                    <tr>
                        <td colspan="6">Aucun projet trouvé.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($projects as $row): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['titre']) ?></td>
                        <td><?= htmlspecialchars($row['description']) ?></td>
                        <td><?= htmlspecialchars($row['annee_creation']) ?></td>
                        <td><a href="<?= htmlspecialchars($row['lien_site']) ?>" target="_blank">Voir le site</a></td>
                        <td><?= htmlspecialchars($row['nom_categorie']) ?></td>
                        <td>
                            <a class="button" href="projet-edit.php?id=<?= $row['id'] ?>">Modifier</a>
                            <a class="button red" href="projet-delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce projet ?');">Supprimer</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
    </table>
   
    </section>
</main>

<footer>
    <p>WebLlume est un projet du cours <strong>Programmation web avancée</strong> avec <strong>Marcos Sanches</strong>.</p>
    <p>Conçu et codé avec ❤️ par 
        <a href="https://github.com/patrihow" target="_blank">@patrihow</a>.
    </p>
    <p>© 2024 WebLlume. Tous droits réservés.</p>
</footer>

</body>
</html>