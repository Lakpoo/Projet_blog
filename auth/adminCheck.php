<?php
session_start();
if (!$_SESSION['degre_privilege'] == 1) {
    header('location: ../pages/index.php');
}
?>