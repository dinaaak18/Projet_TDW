<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Dons</title>
</head>
<?php include __DIR__ . '/../admin/index.php'; ?>

<body>
    <h1>Gestion des Dons</h1>

    <h2>Statistique des Dons</h2>
    <p>Total des dons : <?php echo $donstat; ?></p> 

    <h2>Dons en attente</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Membre</th>
                <th>Montant</th>
                <th>Reçu</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($donsEnAttente as $don): ?>
                <tr>
                    <td><?php echo $don['id']; ?></td>
                    <td><?php echo $don['membre_id']; ?></td>
                    <td><?php echo $don['montant']; ?> DZD</td>
                    <td>
                        <form method="POST" action="/Projet_WEB/public/index.php/dons/voirRecu" target="_blank">
                            <input type="hidden" name="recuPath" value="<?php echo $don['Recu']; ?>">
                            <button type="submit">Voir reçu</button>
                        </form>
                    </td>
                    <td>
                        <form method="POST" action="/Projet_WEB/public/index.php/dons/approuver">
                            <input type="hidden" name="id" value="<?php echo $don['id']; ?>">
                            <button type="submit">Approuver</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Dons confirmés</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Membre</th>
                <th>Montant</th>
                <th>Reçu</th>
                <th>Utilisation</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($donsConfirmes as $don): ?>
                <tr>
                    <td><?php echo $don['id']; ?></td>
                    <td><?php echo $don['membre_id']; ?></td>
                    <td><?php echo $don['montant']; ?> DZD</td>
                    <td>
                        <form method="POST" action="/Projet_WEB/public/index.php/dons/voirRecu" target="_blank">
                            <input type="hidden" name="recuPath" value="<?php echo $don['Recu']; ?>">
                            <button type="submit">Voir reçu</button>
                        </form>
                    </td>
                    <td>
                        <form method="POST" action="/Projet_WEB/public/index.php/dons/terminer">
                            <input type="hidden" name="id" value="<?php echo $don['id']; ?>">
                            <input type="text" name="utilisation" placeholder="Description de l'utilisation" required>
                            <button type="submit">Terminer</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
