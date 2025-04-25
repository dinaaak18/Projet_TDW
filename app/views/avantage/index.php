<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Projet_WEB/public/css/styles.css">
    <title>Avantages et Partenaires</title>
</head>
<body>
    <?php include __DIR__ . '/../layouts/navbar.php'; ?>

    <main class="container">
        <h1 class="page-title">Avantages et Offres</h1>

        <section class="table-section">
            <h2 class="section-title">Avantages</h2>
            <table class="modern-table">
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Description</th>
                        <th>Deadline</th>
                        <th>Partenaire</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($avantages as $avantage): ?>
                        <tr>
                            <td><?= htmlspecialchars($avantage['titre']); ?></td>
                            <td><?= htmlspecialchars($avantage['description']); ?></td>
                            <td>
                                <?= $avantage['deadline'] 
                                    ? htmlspecialchars($avantage['deadline']) 
                                    : 'Aucune deadline'; ?>
                            </td>
                            <td><?= htmlspecialchars($avantage['partenaire_nom']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>

        <section class="table-section">
            <h2 class="section-title">Remises</h2>
            <table class="modern-table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Wilaya</th>
                        <th>Catégorie</th>
                        <th>Remise P</th>
                        <th>Remise J</th>
                        <th>Remise C</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($partners as $partner): ?>
                        <tr>
                            <td><?= htmlspecialchars($partner['nom']); ?></td>
                            <td><?= htmlspecialchars($partner['wilaya']); ?></td>
                            <td><?= htmlspecialchars($partner['categorie']); ?></td>
                            <td><?= htmlspecialchars($partner['remiseP']); ?></td>
                            <td><?= htmlspecialchars($partner['remiseJ']); ?></td>
                            <td><?= htmlspecialchars($partner['remiseC']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>