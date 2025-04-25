<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Projet_WEB/public/css/styles.css">
    <title>Mon Compte</title>
</head>
<body>
    <?php include __DIR__ . '/../layouts/navbar.php'; ?>

    <main class="account-container">
        <h1 class="account-title">Mon Compte</h1>

        <form action="/Projet_WEB/public/index.php/compte/update" method="POST" class="account-form">
            <div class="form-group">
                <label for="nom" class="form-label">Nom :</label>
                <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($user['nom']); ?>" required class="form-input">
            </div>

            <div class="form-group">
                <label for="prenom" class="form-label">Prénom :</label>
                <input type="text" id="prenom" name="prenom" value="<?php echo htmlspecialchars($user['prenom']); ?>" required class="form-input">
            </div>

            <div class="form-group">
                <label for="adresse" class="form-label">Adresse :</label>
                <input type="text" id="adresse" name="adresse" value="<?php echo htmlspecialchars($user['adresse']); ?>" required class="form-input">
            </div>

            <div class="form-group">
                <label for="profession" class="form-label">Profession :</label>
                <input type="text" id="profession" name="profession" value="<?php echo htmlspecialchars($user['profession']); ?>" required class="form-input">
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Mot de passe actuel :</label>
                <input type="password" id="password" name="password" required class="form-input">
            </div>

            <div class="form-group">
                <label for="new_password" class="form-label">Nouveau mot de passe :</label>
                <input type="password" id="new_password" name="new_password" class="form-input">
            </div>

            <button type="submit" class="submit-btn">Mettre à jour</button>
        </form>
    </main>
</body>
</html>