<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Demandes d'Aides</title>
</head>
<?php include __DIR__ . '/../admin/index.php'; ?>

<body>
    <h1>Liste des Demandes d'Aides en Attente</h1>

    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Date de Naissance</th>
                <th>Description</th>
                <th>État</th>
                <th>Type d'Aide</th>
                <th>Dossier</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($aides as $aide): ?>
                <tr>
                    <td><?php echo htmlspecialchars($aide['nom']); ?></td>
                    <td><?php echo htmlspecialchars($aide['prenom']); ?></td>
                    <td><?php echo htmlspecialchars($aide['datenais']); ?></td>
                    <td><?php echo htmlspecialchars($aide['description']); ?></td>
                    <td><?php echo htmlspecialchars($aide['etat'] ?? 'En attente'); ?></td>
                    <td><?php echo htmlspecialchars($aide['typeaide']); ?></td>
                    <td>
                        <?php if ($aide['dossier']): ?>
                            <form method="POST" action="/Projet_WEB/public/index.php/aides/voirDossier" target="_blank">
                                <input type="hidden" name="dossierPath" value="<?php echo $aide['dossier']; ?>">
                                <button type="submit">Voir Dossier</button>
                            </form>
                        <?php else: ?>
                            Pas de dossier disponible.
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
