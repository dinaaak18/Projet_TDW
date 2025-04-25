<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Bénévolats</title>
</head>
<?php include __DIR__ . '/../admin/index.php'; ?>

<body>
    
    <h1>Liste des Bénévolats</h1>

    <p>Total des benevolats : <?php echo $stat; ?></p>

    <table border="1">
        <thead>
            <tr>
                <th>Nom du membre</th>
                <th>Nom de l'activité</th>
                <th>État</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($benevolats)): ?>
                <?php foreach ($benevolats as $benevolat): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($benevolat['membre_nom']); ?></td>
                        <td><?php echo htmlspecialchars($benevolat['activite_nom']); ?></td>
                        <td><?php echo $benevolat['etat'] ?? 'En attente'; ?></td>
                        <td>
                            <form method="POST" action="/Projet_WEB/public/index.php/benevolat/confirmer" style="display:inline;">
                                <input type="hidden" name="benevolat_id" value="<?php echo $benevolat['benevolat_id']; ?>">
                                <button type="submit">Confirmer</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">Aucun bénévolat en attente.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
