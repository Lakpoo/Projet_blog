<?php

// Connexion à MySQL
try {
    $dbh = new PDO('mysql:host=localhost;dbname=exo_conn', 'root', 'password');
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

// Hash du mot de passe
$passwordHashed = password_hash($_POST['password'], PASSWORD_BCRYPT);

// Traitement des données
$query = $dbh->prepare('INSERT INTO donnee_conn (degre_privilege, nom, prenom, email, password) VALUES (:degre_privilege, :nom, :prenom, :email, :password);');
$query->execute([
    'degre_privilege' => 2,
    'nom' => $_POST['nom'],
    'prenom' => $_POST['prenom'],
    'email' => $_POST['email'],
    'password' => $passwordHashed,
]);

// Redirection
header("location: connexion.php");
