<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Projet_WEB/public/css/styles.css">

    <title>Détails du Partenaire</title>
</head>
<body>
    <?php include __DIR__ . '/../layouts/navbar.php'; ?>

    <main class="partner-details-container">
        <section class="partner-details">
            <h2 class="partner-name"><?php echo htmlspecialchars($partnerDetails['nom']); ?></h2>
            <p class="partner-description"><?php echo nl2br(htmlspecialchars($partnerDetails['description'])); ?></p>
        </section>

        <a href="/Projet_WEB/public/index.php/catalogue" class="back-link">Retour au catalogue</a>
    </main>

    <?php include __DIR__ . '/../layouts/footer.php'; ?>
</body>
</html>