<?php   
require_once '../auth/adminCheck.php';
require 'template/header-conn-temp.php';
?>
<style>
    .bp-general{
        width: 0px;
    }
    .nav-left{
        width: 55%;
    }
</style>

<div>
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
    $query = $dbh->query('SELECT id_post, id_user, title, contenue, auteur, log FROM post_blog ORDER BY id_post DESC;');
    $donnees = $query->fetchAll();
    foreach ($donnees as $article): ?>
        <div class="post">
            <div class="head-post">
                <div class="title">
                    <?php echo $article['title'];?>
                </div>
                <div class="btn-suppr">
                    <form action="../auth/deleteRaw.php" method="post">
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
</div>

<?php
require 'template/footer-temp.php';
?>



