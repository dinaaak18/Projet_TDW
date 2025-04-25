<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Membres à Approuver</title>
</head>
<?php include __DIR__ . '/../admin/index.php'; ?>

<body>
    <h1>Liste des Membres à Approuver</h1>

    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Carte de Demande</th>
                <th>Adresse</th>
                <th>Profession</th>
                <th>Images</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($membres as $membre): ?>
                <tr>
                    <td><?php echo htmlspecialchars($membre['nom']); ?></td>
                    <td><?php echo htmlspecialchars($membre['prenom']); ?></td>
                    <td><?php echo htmlspecialchars($membre['cartedemande']); ?></td>
                    <td><?php echo htmlspecialchars($membre['adresse']); ?></td>
                    <td><?php echo htmlspecialchars($membre['profession']); ?></td>
                    <td>
                        <?php if ($membre['carteid']): ?>
                            <a href="/Projet_WEB/public/<?php echo $membre['carteid']; ?>" target="_blank">Voir Carte ID</a>
                        <?php endif; ?>
                        <?php if ($membre['recu']): ?>
                            <a href="/Projet_WEB/public/<?php echo $membre['recu']; ?>" target="_blank">Voir Reçu</a>
                        <?php endif; ?>
                        <?php if ($membre['photo']): ?>
                            <a href="/Projet_WEB/public/<?php echo $membre['photo']; ?>" target="_blank">Voir Photo</a>
                        <?php endif; ?>
                    </td>
                    <td>
                        <form method="POST" action="/Projet_WEB/public/index.php/membres/approuver">
                            <input type="hidden" name="id" value="<?php echo $membre['id']; ?>">
                            <button type="submit">Approuver</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
