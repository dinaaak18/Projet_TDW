<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Activité</title>
</head>
<body>
<?php include __DIR__ . '/../admin/index.php'; ?>

    <h1>Ajouter une Activité</h1>
    <form method="POST" action="/Projet_WEB/public/index.php/activites/add">
        <label for="titre">Titre :</label>
        <input type="text" id="titre" name="titre" required><br><br>

        <label for="description">Description :</label>
        <textarea id="description" name="description" required></textarea><br><br>

        <label for="date">Date :</label>
        <input type="date" id="date" name="date" required><br><br>

        <label for="lieu">Lieu :</label>
        <input type="text" id="lieu" name="lieu" required><br><br>


        <label for="type">Type :</label>
        <select id="type" name="type" required>
            <option value="Evenement">Événement</option>
            <option value="Annonce">Annonce</option>
            <option value="Autre">Autre</option>
        </select><br><br>

        <button type="submit">Ajouter</button>
        <a href="/Projet_WEB/public/index.php/activites">Annuler</a>
    </form>
</body>
</html>
