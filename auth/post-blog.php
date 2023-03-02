<?php

// Connexion à MySQL
try {
    $dbh = new PDO('mysql:host=localhost;dbname=exo_conn', 'root', 'password');
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

// Traitement des données
session_start();
$auteur  = $_SESSION['prenom'];
$id_user = $_SESSION['id_user'];
$dp = $_SESSION['degre_privilege'];
$dt = time();
$query = $dbh->prepare('INSERT INTO post_blog (id_user, title, contenue, auteur, log) VALUES (:id_user, :title, :contenue, :auteur, :log);');
if($dp == 1){//admin
    $query->execute([
        'id_user' => $id_user, // Insersion de l'id_user recupere du compte connecte
        'title' => $_POST['title'],
        'contenue' => $_POST['contenue'],
        'auteur' => $auteur,
        'log' => $dt, //Conversion du time() en format français
    ]);
}elseif($dp == 2){//user normal 
    $query->execute([
        'id_user' => $id_user, // Insersion de l'id_user recupere du compte connecte
        'title' => $_POST['title'],
        'contenue' => $_POST['contenue'],
        'auteur' => $auteur,
        'log' => $dt, //Conversion du time() en format français
    ]);    
}

// Redirection
header("location: ../pages/workspace/workspace.php");