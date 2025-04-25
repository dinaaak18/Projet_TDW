<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Projet_WEB/public/css/styles.css">
    <title>Historique de l'utilisateur</title>
</head>
<body>
    <header>
        <h1 id="page-title">Historique de l'utilisateur</h1>
        <?php include __DIR__ . '/../layouts/navbar.php'; ?>
    </header>

    <main>
        <section id="dons-section">
            <h2>Vos Dons</h2>
            <?php if (!empty($dons)): ?>
                <table class="history-table" id="dons-table">
                    <thead>
                        <tr>
                            <th>Montant</th>
                            <th>État</th>
                            <th>Utilisation</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dons as $don): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($don['montant']); ?> DA</td>
                                <td><?php echo htmlspecialchars($don['etat'] ?? ''); ?></td>
                                <td><?php echo htmlspecialchars($don['utilisation'] ?? ''); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p class="no-data-message">Vous n'avez effectué aucun don.</p>
            <?php endif; ?>
        </section>

        <section id="benevolat-section">
            <h2>Vos Activités de Bénévolat</h2>
            <?php if (!empty($benevolats)): ?>
                <table class="history-table" id="benevolat-table">
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Description</th>
                            <th>Lieu</th>
                            <th>Date</th>
                            <th>État</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($benevolats as $benevolat): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($benevolat['titre']); ?></td>
                                <td><?php echo htmlspecialchars($benevolat['description']); ?></td>
                                <td><?php echo htmlspecialchars($benevolat['lieu']); ?></td>
                                <td><?php echo htmlspecialchars($benevolat['date']); ?></td>
                                <td><?php echo htmlspecialchars($benevolat['etat'] ?? ''); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p class="no-data-message">Vous n'avez participé à aucune activité de bénévolat.</p>
            <?php endif; ?>
        </section>
    </main>
</body>
</html>
