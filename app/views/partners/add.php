<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Partenaire</title>
</head>
<?php include __DIR__ . '/../admin/index.php'; ?>

<body>
    <h1>Ajouter un Partenaire</h1>
    <form action="/Projet_WEB/public/index.php/partners/add" method="POST" enctype="multipart/form-data">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required><br><br>

        <label for="categorie">Catégorie :</label>
        <input type="text" id="categorie" name="categorie" required><br><br>

        <label for="wilaya">Wilaya :</label>
        <input type="text" id="wilaya" name="wilaya" required><br><br>

        <label for="remiseP">Remise P :</label>
        <input type="number" id="remiseP" name="remiseP" step="0.01" required><br><br>

        <label for="remiseJ">Remise J :</label>
        <input type="number" id="remiseJ" name="remiseJ" step="0.01" required><br><br>

        <label for="remiseC">Remise C :</label>
        <input type="number" id="remiseC" name="remiseC" step="0.01" required><br><br>

        <label for="contact">Contact :</label>
        <input type="text" id="contact" name="contact" required><br><br>

        <label for="adresse">Adresse :</label>
        <textarea id="adresse" name="adresse" required></textarea><br><br>

        <label for="description">Description :</label>
        <textarea id="description" name="description"></textarea><br><br>

        <label for="username">Nom d'utilisateur :</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required><br><br>

        <label for="photo">Photo :</label>
        <input type="file" id="photo" name="photo" accept="image/*"><br><br>

        <label for="logo">Logo :</label>
        <input type="file" id="logo" name="logo" accept="image/*"><br><br>

        <button type="submit">Ajouter</button>
        <a href="/Projet_WEB/public/index.php/partners">Annuler</a>
    </form>
</body>
</html>
