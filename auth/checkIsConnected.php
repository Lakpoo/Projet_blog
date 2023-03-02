<?php
session_start();
if ($_SESSION['is-connected'] = false) {
    header('location: /connexion/connexion.php');
}
?>