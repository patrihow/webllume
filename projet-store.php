<?php
if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header('location:projet-index.php');
    exit;
}
require_once('db/connex.php');

foreach($_POST as $key => $value){
    $$key=$value;
}

$sql = "INSERT INTO projet (titre, description, lien_site, image, categorie) VALUES (?,?,?,?,?)";

$stmt = $pdo->prepare($sql);
if($stmt->execute(array($titre, $description, $lien_site, $image, $categorie))){
    $id = $pdo->lastInsertId();
   header('location:projet-show.php?id='.$id);
}else{
    print_r($stmt->errorInfo());
}

?>