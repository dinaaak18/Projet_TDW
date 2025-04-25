<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Notification</title>
</head>
<?php include __DIR__ . '/../admin/index.php'; ?>

<body>
    <h1>Ajouter une Notification</h1>
    <form method="POST" action="/Projet_WEB/public/index.php/notifications/add">
        <label for="titre">Titre :</label>
        <input type="text" id="titre" name="titre" required><br><br>

        <label for="contenu">Contenu :</label>
        <textarea id="contenu" name="contenu" required></textarea><br><br>

        <button type="submit">Ajouter</button>
        <a href="/Projet_WEB/public/index.php/notifications">Annuler</a>
    </form>
</body>
</html>
