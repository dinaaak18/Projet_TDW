<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Partenaires</title>
    <link rel="stylesheet" href="/Projet_WEB/public/css/style.css">
</head>
<?php include __DIR__ . '/../admin/index.php'; ?>

<body>
    <div id="container">
        <h1 id="page-title">Liste des Partenaires</h1>
        <a href="/Projet_WEB/public/index.php/partners/add" id="add-partner-btn">Ajouter un Partenaire</a>
        <table id="partners-table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Catégorie</th>
                    <th>Wilaya</th>
                    <th>Remises</th>
                    <th>Contact</th>
                    <th>Adresse</th>
                    <th>Statistiques</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($partners as $partner): ?>
                    <tr class="partner-row">
                        <td><?php echo htmlspecialchars($partner['nom']); ?></td>
                        <td><?php echo htmlspecialchars($partner['categorie']); ?></td>
                        <td><?php echo htmlspecialchars($partner['wilaya']); ?></td>
                        <td><?php echo "P: {$partner['remiseP']}, J: {$partner['remiseJ']}, C: {$partner['remiseC']}"; ?></td>
                        <td><?php echo htmlspecialchars($partner['contact']); ?></td>
                        <td><?php echo htmlspecialchars($partner['adresse']); ?></td>
                        <td><?php echo $partner['Stat']; ?></td>
                        <td>
                            <form method="POST" action="/Projet_WEB/public/index.php/partners/edit" class="action-form">
                                <input type="hidden" name="id" value="<?php echo $partner['id']; ?>">
                                <button type="submit" class="edit-btn">Modifier</button>
                            </form>
                            <form method="POST" action="/Projet_WEB/public/index.php/partners/delete" class="action-form">
                                <input type="hidden" name="id" value="<?php echo $partner['id']; ?>">
                                <button type="submit" class="delete-btn" onclick="return confirm('Êtes-vous sûr ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
