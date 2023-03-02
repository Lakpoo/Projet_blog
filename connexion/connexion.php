<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="resetcss" href="reset.css">
    <link rel="stylesheet" href="style.css">
    <title>Connexion</title>
</head>
<body>
    <div class="bp-general">
      <div class="bp-retour">
        <form action="../index.php"><button class="bp">Retour</button></form>
      </div>
    </div>
    <div class="conn">
        <h1>Connexion</h1>
        <p>Veuillez renseigner vos informations de connexion ci dessous</p>
        <form action="../auth/connexion.php" method="post">
          <div>
            <label for="email">Identifiant</label>
            <input type="email" id="email" name="email" placeholder="Identifiant" required>
          </div>
          <div>
            <label for="password">Mot de Passe</label>
            <input type="password" id="password" name="password" placeholder="Mot de Passe" required>
          </div>
          <div>
            <button type="submit">Se connecter</button>
          </div>
        </form>
        </div>
    </div>
</body>
</html>
