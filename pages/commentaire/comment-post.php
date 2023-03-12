<?php
//connexion bdd
try {
    $dbh = new PDO('mysql:host=localhost;dbname=exo_conn', 'root', 'password');
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

session_start();
if ($_SESSION['is-connected'] = false) {
    header('location: /connexion/connexion.php');
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
        <div>
            <form action="" method="post">
                <input type="text" name="id_post" value="<?= $article['id_post'] ?>" hidden>
                <input type="text" name="commentaire" id="commentaire" placeholder="Commentaire" required>
            </form>
        </div>
    </div>
<?php
require '../template/footer-temp.php';
?>