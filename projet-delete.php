<?php
require_once('classes/CRUD.php');
require_once('classes/Projet.php');

if (isset($_GET['id'])) {
    $projet = new Projet();
    $projet->deleteProject($_GET['id']);
    header("Location: projet-show.php");
    exit();
}
?>