<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Projet_WEB/public/css/styles.css">
    <title>Demander de l'aide</title>
</head>
<body>
    <header class="header">
        <h1 class="header-title">Demander de l'aide</h1>
    </header>
    <?php include __DIR__ . '/../layouts/navbar.php'; ?>

    <section class="instructions-section">
        <h2 class="section-title">Instructions</h2>
        <p class="instructions-text">Veuillez organiser votre dossier zip en fonction du type d'aide demandé. Voici les informations disponibles :</p>
        <ul class="instructions-list">
            <?php foreach ($types as $type): ?>
                <li class="instruction-item">
                    <strong>Type d'aide :</strong> <?php echo htmlspecialchars($type['type']); ?><br>
                    <strong>Description :</strong> <?php echo htmlspecialchars($type['description']); ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>

    <section class="form-section">
        <form action="/Projet_WEB/public/index.php/aide/store" method="post" enctype="multipart/form-data" class="help-form">
            <div class="form-group">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" required>
            </div>

            <div class="form-group">
                <label for="prenom">Prénom :</label>
                <input type="text" id="prenom" name="prenom" required>
            </div>

            <div class="form-group">
                <label for="datenaiss">Date de naissance :</label>
                <input type="date" id="datenaiss" name="datenaiss" required>
            </div>

            <div class="form-group">
                <label for="typeaide">Type d'aide :</label>
                <select id="typeaide" name="typeaide" required>
                    <option value="">-- Sélectionner un type d'aide --</option>
                    <?php foreach ($types as $type): ?>
                        <option value="<?php echo htmlspecialchars($type['type']); ?>">
                            <?php echo htmlspecialchars($type['type']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="description">Description :</label>
                <textarea id="description" name="description" rows="5" required></textarea>
            </div>

            <div class="form-group">
                <label for="dossier">Télécharger un dossier (format .zip) :</label>
                <input type="file" id="dossier" name="dossier" accept=".zip" required>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-submit">Envoyer</button>
            </div>
        </form>
    </section>
</body>
</html>
