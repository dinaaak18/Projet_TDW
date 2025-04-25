<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activités</title>
    <link rel="stylesheet" href="/Projet_WEB/public/css/styles.css">
</head>
<body>

<?php include __DIR__ . '/../layouts/navbar.php'; ?>

<main class="activities-container">
    <h1 class="activities-title">Toutes les Activités</h1>

    <div class="news">
        <?php if (!empty($activities)): ?>
            <?php foreach ($activities as $activity): ?>
                <div class="news-item">
                    <h3 class="news-title"><?php echo htmlspecialchars($activity['titre']); ?></h3>
                    <p class="news-description"><?php echo htmlspecialchars($activity['description']); ?></p>
                    <p class="news-date"><?php echo htmlspecialchars($activity['date']); ?></p>
                    
                    <form method="POST" action="/Projet_WEB/public/index.php/participer" class="participer-form">
                        <input type="hidden" name="activite_id" value="<?php echo $activity['id']; ?>">
                        <button type="submit" class="participer-btn">Participer</button>
                    </form>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="no-activities">Aucune activité disponible pour le moment.</p>
        <?php endif; ?>
    </div>
</main>

<?php include __DIR__ . '/../layouts/footer.php'; ?>
</body>
</html>