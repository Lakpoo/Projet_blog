<?php
session_start();
if (isset($_SESSION['is-connected']) && $_SESSION['is-connected']) {
    header('location: pages/index.php');
}
else{
    require 'pages/template/header-disc-temp.php';
    require 'pages/template/all-post.php';
    require 'pages/template/footer-temp.php';
}
?>