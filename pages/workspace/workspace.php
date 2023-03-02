<?php   
require '../template/header-conn-temp.php';
?>

<div class="menu">
    <div class="left-menu">
        <div class="compteur-post">
            <!-- <p>Compteur article : </p> -->
        </div>
    </div>
    <div class="middle-menu">
        <div class="create-tab">
            <div class="title-workspace">
                <p>Créer un post pour votre blog :</p>
            </div>
            <div class="title-desc-workspace">
                <form action="../../auth/post-blog.php" method="POST">
                    <div>
                        <input type="title" name="title" id="title" placeholder="Titre" required>
                    </div>  
                    <div class="textarea-contenue">
                        <textarea type="text" name="contenue" id="contenue" placeholder="Contenu de votre post" required class="textarea"></textarea>
                    </div>
                    <div>
                        <button type="submit">Poster</button>
                    </div>
                </form>
            </div>
            <div class="affichage-post">
                <?php require '../template/user-post.php'; ?>
            </div>
        </div>
    </div>
    <div class="right-menu">

    </div>
</div>

<?php
require '../template/footer-temp.php'; 
?>