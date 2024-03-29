<?php
//connexion bdd
try {
    $dbh = new PDO('mysql:host=localhost;dbname=exo_conn', 'root', 'password');
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
// Requete SQL : SELECT id_post, id_post, title, contenue, log FROM exo_conn.post_blog ORDER BY post_blog.id_post DESC;

    session_start();
    $_POST['id_user'] = $_SESSION['id_user'];
    $id_user = $_POST['id_user'];
    $query = $dbh->prepare('SELECT id_post, id_user, title, contenue, auteur, log FROM post_blog WHERE id_user = ? ORDER BY log DESC');
    $query->bindParam(1, $id_user, PDO::PARAM_INT);
    $query->execute();
    $donnees = $query->fetchAll();

    foreach ($donnees as $article): ?>
        <div class="post">
            <div class="head-post">
                <div class="form-modif">
                    <form action="../workspace/workspace.php" methode="post">
                        <input type="text" name="id_post" value="<?= $article['id_post'] ?>" hidden>
                        <input type="text" name="title" value="<?= $article['title'] ?>" hidden>
                        <input type="text" name="contenue" value="<?= $article['contenue'] ?>" hidden>
                        <button type="submit" class="bp-modif">Modifier</button>
                    </form>
                </div>  
                <div class="title">
                    <?php echo $article['title'];?>
                </div>
                <div class="btn-suppr">
                    <form action="../../auth/delete.php" method="post">
                        <input type="text" name="id_post" value="<?= $article['id_post'] ?>" hidden>
                        <button type="submit" class="bpdel"><img src="../../image/bin.png" alt="Submit" style="height: 15px;"></button>
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
