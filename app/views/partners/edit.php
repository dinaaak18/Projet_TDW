<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Partenaire</title>
</head>
<?php include __DIR__ . '/../admin/index.php'; ?>

<body>
    <h1>Modifier un Partenaire</h1>
    <form action="/Projet_WEB/public/index.php/partners/update" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($partner['id']); ?>">

        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($partner['nom']); ?>" required><br><br>

        <label for="categorie">Catégorie :</label>
        <input type="text" id="categorie" name="categorie" value="<?php echo htmlspecialchars($partner['categorie']); ?>" required><br><br>

        <label for="wilaya">Wilaya :</label>
        <input type="text" id="wilaya" name="wilaya" value="<?php echo htmlspecialchars($partner['wilaya']); ?>" required><br><br>

        <label for="remiseP">Remise P :</label>
        <input type="number" id="remiseP" name="remiseP" value="<?php echo htmlspecialchars($partner['remiseP']); ?>" step="0.01" required><br><br>

        <label for="remiseJ">Remise J :</label>
        <input type="number" id="remiseJ" name="remiseJ" value="<?php echo htmlspecialchars($partner['remiseJ']); ?>" step="0.01" required><br><br>

        <label for="remiseC">Remise C :</label>
        <input type="number" id="remiseC" name="remiseC" value="<?php echo htmlspecialchars($partner['remiseC']); ?>" step="0.01" required><br><br>

        <label for="contact">Contact :</label>
        <input type="text" id="contact" name="contact" value="<?php echo htmlspecialchars($partner['contact']); ?>" required><br><br>

        <label for="adresse">Adresse :</label>
        <textarea id="adresse" name="adresse" required><?php echo htmlspecialchars($partner['adresse']); ?></textarea><br><br>

        <label for="description">Description :</label>
        <textarea id="description" name="description"><?php echo htmlspecialchars($partner['description']); ?></textarea><br><br>

        <label for="photo">Photo :</label>
        <input type="file" id="photo" name="photo" accept="image/*"><br><br>

        <label for="logo">Logo :</label>
        <input type="file" id="logo" name="logo" accept="image/*"><br><br>

        <button type="submit">Enregistrer les modifications</button>
        <a href="/Projet_WEB/public/index.php/partners">Annuler</a>
    </form>
</body>
</html>
