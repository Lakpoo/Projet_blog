<?php

try {
    $dbh = new PDO('mysql:host=localhost;dbname=exo_conn', 'root', 'password');
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

$query = $dbh->prepare("DELETE FROM commentaire_post WHERE contenue = ?");
$query->execute([$_POST['contenue']]);

header('location: ../pages/index.php');
?>