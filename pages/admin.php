<?php   
require 'template/header-conn-temp.php';
?>
<style>
    .bp-general{
        width: 0px;
    }
</style>


<div class="admin">
    <?php
    //connexion bdd
    session_start();
    if ($_SESSION['degre_privilege'] == 1) {
        try {
            $dbh = new PDO('mysql:host=localhost;dbname=exo_conn', 'root', 'password');
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }
    ?>
    <div class="all-post">
        <?php
        if ($_SESSION['degre_privilege'] == 1) {
            $query = $dbh->query('SELECT id_post, id_user, title, contenue, auteur, log FROM post_blog ORDER BY id_post DESC;');
            $donnees = $query->fetchAll();
            foreach ($donnees as $article): ?>
                <div class="post" style="margin-left: 100px;">
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
            <?php endforeach; 
        } else { ?>
            <div class="not-admin">
                <?php echo("Pas d'admin pour toi ;) "); ?>
            </div>
        <?php } ?>
    </div>
    <div class="all-comment">
        <?php if ($_SESSION['degre_privilege'] == 1){
                $requete = $dbh->prepare('SELECT id_user, id_post, auteur, contenue, log FROM commentaire_post ORDER BY log DESC');
                $requete->execute();
                $commentaire = $requete->fetchAll();
                foreach ($commentaire as $com): ?>
                    <div class="com" style="margin-left: 100px;">
                        <div class="header-com">
                            <div class="contenue-com">
                                <?php echo $com['contenue'] ?>
                            </div>
                            <?php if ($_SESSION['degre_privilege'] == 1): ?>
                                <div class="btn-suppr">
                                    <form action="../../auth/delete_com.php" method="post">
                                        <input type="text" name="contenue" value="<?= $com['contenue'] ?>" hidden>
                                        <button type="submit" class="bpdel"><img src="../../image/bin.png" alt="Submit" style="height: 15px;"></button>
                                    </form>
                                </div>
                            <?php endif ; ?>
                        </div>
                        <div class="footer-com">
                            <div class="auteur-com">
                                <p>Writter by : <?php echo $com['auteur'] ?></p>
                            </div>
                            <div class="time-com">
                                <?php echo gmdate("d-m-Y H:i:s", ($com['log'] + 3600));?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; 
            } ?>
    </div>
</div>

<?php require 'template/footer-temp.php'; ?>



