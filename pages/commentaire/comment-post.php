<?php
session_start();
if (!isset($_SESSION['id_user'])) {
    header('location: /connexion/connexion.php');
}

//connexion bdd
try {
    $dbh = new PDO('mysql:host=localhost;dbname=exo_conn', 'root', 'password');
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

require '../template/header-conn-temp.php';

    $query = $dbh->prepare('SELECT id_post, id_user, title, contenue, auteur, log FROM post_blog WHERE id_post = ?');
    $query->execute([$_POST['id_post']]);
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
                <div class="time">
                    <?php echo gmdate("d-m-Y H:i:s", ($article['log'] + 3600));?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <div class="commentaire-input">
        <form action="send-comment-post.php" method="post">
            <input type="text" name="id_post" value="<?= $article['id_post'] ?>" hidden>
            <input type="text" name="commentaire" id="commentaire" placeholder="Commentaire" style="background: #33396c;" required>
            <div class="bp-submit">
                <button type="submit">Poster</button>
            </div>
        </form>
    </div>
    <?php
    $id_post = $_POST['id_post'];
    $requete = $dbh->prepare('SELECT id_user, id_post, auteur, contenue, log FROM commentaire_post WHERE id_post = ? ORDER BY log DESC');
    $requete->bindParam(1, $id_post, PDO::PARAM_INT);
    $requete->execute();
    $commentaire = $requete->fetchAll();
    foreach ($commentaire as $com): ?>
        <div class="com">
            <div class="contenue-com">
                <?php echo $com['contenue'] ?>
            </div>
            <div class="footer-com">
                <div class="auteur">
                    <p>Writter by : <?php echo $com['auteur'] ?></p>
                </div>
                <div class="time">
                    <?php echo gmdate("d-m-Y H:i:s", ($com['log'] + 3600));?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php
require '../template/footer-temp.php';
?>