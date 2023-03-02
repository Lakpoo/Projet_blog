<?php
//connexion bdd
try {
    $dbh = new PDO('mysql:host=localhost;dbname=exo_conn', 'root', 'password');
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
// Requete SQL : SELECT id_post, id_post, title, contenue, log FROM exo_conn.post_blog ORDER BY post_blog.id_post DESC;
?>
<?php
    session_start();
    $id_user = $_SESSION['id_user'];
    $_POST['id_user'] = $id_user;
    $query = $dbh->query('SELECT id_post, id_user, title, contenue, log FROM post_blog WHERE id_user = ?');
    $query->execute([$_SESSION['id_user']]);
    $donnees = $query->fetch();
    foreach ($donnees as $article): ?>
        <div class="post">
            <div class="head-post">
                <div class="title">
                    <?php echo $article['title'];?>
                </div>
                <div class="btn-suppr">
                    <form action="../../auth/deleteRaw2.php" method="post">
                        <input type="text" name="id_post" value="<?= $article['id_post'] ?>" hidden>
                        <button type="submit" class="bpdel"><img src="../image/bin.png" alt="Submit" style="height: 15px;"></button>
                    </form>
                </div>
            </div>
            <div class="contenue">
                <?php echo $article['contenue'];?>
            </div>
            <div class="footer-post">
                <div class="auteur">
                    <p>Writter by : <?php echo $article['auteur'] ?></p>
                </div>
                <div class="time">
                    <?php echo gmdate("d-m-Y H:i:s", ($article['log'] + 3600));?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
