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
$query = $dbh->prepare('INSERT INTO commentaire_post (id_user, id_post, auteur, contenue, log) VALUES (:id_user, :id_post, :auteur, :contenue, :log);');
if($dp == 1){//admin
    $query->execute([
        'id_user' => $id_user, // Insersion de l'id_user recupere du compte connecte
        'id_post' => $_POST['id_post'],
        'auteur' => $auteur,
        'contenue' => $_POST['commentaire'],
        'log' => $dt, 
    ]);
}elseif($dp == 2){//user normal 
    $query->execute([
        'id_user' => $id_user, // Insersion de l'id_user recupere du compte connecte
        'id_post' => $_POST['id_post'],
        'auteur' => $auteur,
        'contenue' => $_POST['commentaire'],
        'log' => $dt, 
    ]);    
}

// Redirection
header("location: /pages/index.php");
?>