<?php
//connexion bdd
try {
    $dbh = new PDO('mysql:host=localhost;dbname=exo_conn', 'root', 'password');
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
?>

<?php
$query = $dbh->query('SELECT COUNT(id_user) FROM donnee_conn;');
$usercount = $query->fetchColumn(); 
$query1 = $dbh->query('SELECT COUNT(id_post) FROM post_blog;');
$postcount = $query1->fetchColumn();
$query2 = $dbh->query('SELECT COUNT(id) FROM commentaire_post');
$comcount = $query2->fetchColumn();
?>
<div class="stat">
    <div class="user-count">
        <p>Nombre d'utilisateur du blog : <?php echo $usercount; ?></p>
    </div>
    <div class="post-count">
        <p>Nombre d'article poster : <?php echo $postcount; ?></p>
    </div>
    <div class="com-count">
        <p>Nombre de commentaire poster : <?php echo $comcount; ?></p>
    </div>
</div>
