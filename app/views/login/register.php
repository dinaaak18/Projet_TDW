<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <h1>Créer un compte</h1>
    <form action="/Projet_WEB/public/index.php/inscrire" method="POST">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required><br>

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required><br>

        <label for="username">Nom d'utilisateur :</label>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required><br>

        <label for="confirm_password">Confirmer le mot de passe :</label>
        <input type="password" id="confirm_password" name="confirm_password" required><br>

        <input type="submit" value="S'inscrire">
    </form>
    <p>Déjà un compte ? <a href="/Projet_WEB/public/index.php/login">Connectez-vous</a>.</p>
</body>
</html>
