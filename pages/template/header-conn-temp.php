<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="resetcss" href="reset.css">
    <link rel="stylesheet" href="style.css">
    <title>Page principale</title>
</head>
<body>
    <div class="main">
        <header>
        <div class="nav-left">
            <a class="text-logo" href="http://localhost/pages/index.php">BLOG</a>
        </div>
        <div class="nav-right">
            <nav class="navMenu">
                <a class="home" href="/pages/index.php">Home</a>
                <a class="workspace" href="/pages/workspace/workspace.php">Workspace</a>
                <a class="Compte" href="../auth/adminCheck.php">Admin</a>
                <div class="dot"></div>
            </nav>
        </div>
            <div class="bp-general">
                <div class="bp-disc">   
                    <form action="/auth/disconnect.php"><button class="bp">Déconnexion</button></form>
                </div>
            </div>
        </header>
    </div>