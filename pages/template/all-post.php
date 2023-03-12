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
    $query = $dbh->query('SELECT id_post, id_user, title, contenue, auteur, log FROM post_blog ORDER BY log DESC;');
    $donnees = $query->fetchAll();
    foreach ($donnees as $article): ?>
        <div class="post">
            <div class="head-post">
                <div class="title">
                    <?php echo $article['title'];?>
                </div>
            </div>
            <div class="contenue">
                <?php echo $article['contenue'];?>
            </div>
            <div class="footer-post">
                <div class="auteur">
                    <p>Writter by : <?php echo $article['auteur'] ?></p>
                </div>
                <div class="commentaire">
                    <form action="/pages/commentaire/comment-post.php" method="post">
                        <input type="text" name="id_post" value="<?= $article['id_post'] ?>" hidden>
                        <button>Commenter</button>
                    </form>
                </div>
                <div class="time">
                    <?php echo gmdate("d-m-Y H:i:s", ($article['log'] + 3600));?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
