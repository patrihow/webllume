<?php
require_once 'classes/CategoryManager.php'; 

$categoryManager = new CategoryManager(); 
$categories = $categoryManager->getCategories(); 

foreach ($categories as $category) {
    echo 'Categorie: ' . $category['nom_categorie'] . '<br>';
}
?>