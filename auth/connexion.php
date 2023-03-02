<?php
// Connexion à MySQL
try {
    $dbh = new PDO('mysql:host=localhost;dbname=exo_conn', 'root', 'password');
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

$query = $dbh->prepare('SELECT id_user, degre_privilege, nom, prenom, email, password FROM donnee_conn WHERE email = ?');
$query->execute([$_POST['email']]);

$user = $query->fetch();
if ($user) {
    if (password_verify($_POST['password'], $user['password'])) {
        session_start();
        $_SESSION['id_user'] = $user['id_user'];
        $_SESSION['is-connected'] = true;
        $_SESSION['degre_privilege'] = $user['degre_privilege'];
        $_SESSION['prenom'] = $user['prenom'];
        unset($_SESSION['error-connection']);
        header('location: ../pages/index.php');
    } else {
        session_start();
        $_SESSION['error-connection'] = "L'email ou le mot de passe est incorrect";
        header('location: ../connexion/connexion.php'); 
    }
} else {
    session_start();
    $_SESSION['error-connection'] = "L'email ou le mot de passe est incorrect";
    header('location: ../connexion/connexion.php');
}

?>