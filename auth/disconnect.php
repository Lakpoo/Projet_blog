<?php
session_start();
$_SESSION['is-connected'] = false;

// Redirection
header('location: /connexion/connexion.php');