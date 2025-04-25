<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Se connecter</h2>
    <form action="/Projet_WEB/public/index.php/connecter" method="POST">
    <label for="username">Nom d'utilisateur :</label>
    <input type="text" id="username" name="username" required><br><br>

    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password" required><br><br>

    <input type="submit" value="Se connecter">
</form>


</body>
</html>
