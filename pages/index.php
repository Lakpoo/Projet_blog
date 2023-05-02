<?php
session_start();
if (!$_SESSION['is-connected']) {
    header('location: /connexion/connexion.php');
}
?>
<?php
require 'template/header-conn-temp.php'; ?>
<style>
    .bp-general{
        width: 0px;
    }
    .nav-left{
        width: 55%;
    }
</style>
<?php
require 'template/statistique.php';
require 'template/all-post.php';
require 'template/footer-temp.php';
?>