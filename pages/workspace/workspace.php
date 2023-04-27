<?php   
require '../template/header-conn-temp.php';
?>

<div class="menu">
    <div class="middle-menu">
        <div class="create-tab">
            <div class="title-workspace">
                <p>Créer un post pour votre blog :</p>
            </div>
            <div class="title-desc-workspace">
                <form action="../../auth/post-blog.php" method="POST">
                    <div>
                        <input type="title" name="title" id="title" placeholder="Titre" required autocomplete="off">
                    </div>
                    <div class="textarea-contenue">
                        <textarea type="text" name="contenue" id="contenue" placeholder="Contenu de votre post" required class="textarea" autocomplete="off"></textarea>
                    </div>
                    <div class="bp-submit">
                        <button type="submit">Poster</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
        <div class="affichage-post">
            <?php require '../template/user-post.php'; ?>
        </div>
</div>

<?php require '../template/footer-temp.php'; ?>