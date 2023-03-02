<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="resetcss" href="reset.css">
    <link rel="stylesheet" href="style2.css">
    <title>Inscription</title>
</head>
<body>
    <div class="bp-general">
      <div class="bp-retour">
        <form action="../index.php"><button class="bp">Retour</button></form>
      </div>
    </div>
    <div class="insc">
        <h1>Inscription</h1>
        <p>Veuillez renseigner vos informations ci dessous</p>
        <form action="../auth/inscr.php" method="post">
          <div>
            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom" placeholder="Nom" required>
          </div>
          <div>
            <label for="prenom">Prenom</label>
            <input type="text" id="prenom" name="prenom" placeholder="Prenom" required>
          </div>
          <div>
            <label for="email">Adresse mail</label>
            <input type="text" id="email" name="email" placeholder="Email" required>
          </div>
          <div>
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" placeholder="Mot de passe" required>
          </div>
          <div>
            <button type="submit">S'inscrire</button>
          </div>
        </form>
      </div>
      <div class="bp-general">
        <div class="bp-conn">
          <form action="..\connexion\connexion.php" method="post"><button class="bp">Connexion</button></form>
        </div>
        
      </div>
    </div>
</body>
</html>

<?php
