<?php
session_start();
if (!$_SESSION['degre_privilege'] == 1) {
    header('location: ../pages/index.php');
}
else{
    header('location: ../pages/admin.php');
}
?>