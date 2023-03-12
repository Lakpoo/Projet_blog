<?php

try {
    $dbh = new PDO('mysql:host=localhost;dbname=exo_conn', 'root', 'password');
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

$query = $dbh->prepare("DELETE FROM post_blog WHERE id_post = ?");
$query->execute([$_POST['id_post']]);

header('location: ../pages/workspace/workspace.php');
?>