<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Projet_WEB/public/css/styles.css">

    <title>Partenaires Favoris</title>
</head>
<body>
    <?php include __DIR__ . '/../layouts/navbar.php'; ?>

    <main class="favorites-container">
        <section class="favorites">
            <h2 class="favorites-title">Vos partenaires favoris</h2>

            <?php if (!empty($favoritePartners)): ?>
                <ul class="favorites-list">
                    <?php foreach ($favoritePartners as $partner): ?>
                        <li class="favorite-item">
                            <span class="partner-name"><?php echo $partner['nom']; ?></span>
                            <button class="remove-favorite-btn" data-partner-id="<?php echo $partner['id']; ?>">Supprimer</button>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p class="no-favorites">Vous n'avez ajouté aucun partenaire à vos favoris.</p>
            <?php endif; ?>
        </section>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const removeButtons = document.querySelectorAll('.remove-favorite-btn');

            removeButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const partnerId = this.getAttribute('data-partner-id');

                    if (confirm('Voulez-vous vraiment supprimer ce partenaire des favoris ?')) {
                        fetch('/Projet_WEB/public/index.php/removeFavorite', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded',
                            },
                            body: `partner_id=${partnerId}`,
                        })
                            .then(response => response.json())
                            .then(data => {
                                if (data.status === 'success') {
                                    alert(data.message);
                                    location.reload();
                                } else {
                                    alert(data.message);
                                }
                            })
                            .catch(error => console.error('Erreur:', error));
                    }
                });
            });
        });
    </script>

    <?php include __DIR__ . '/../layouts/footer.php'; ?>
</body>
</html>