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