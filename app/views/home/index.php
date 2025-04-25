<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'Accueil - Association</title>
    <link rel="stylesheet" href="/Projet_WEB/public/css/styles.css">
</head>
<body>


    <?php include __DIR__ . '/../layouts/navbar.php'; ?>

    
    <!--<section class="diapo">
    <div class="ext">
        <div class="int">
            
    <?php foreach ($partnersPhotos as $partner): ?>
        <div class="img">
            <img src="<?php echo htmlspecialchars($partner['photo']); ?>" alt="Partenaire: <?php echo htmlspecialchars($partner['nom']); ?>" class="image">
        </div>
    <?php endforeach; ?>
  
    </div> 
    </div>
</section>-->





    <section class="main-content">
    <h2 class="section-title">Nouvelles de l'Association</h2>

    <div class="news">
        <?php foreach ($recentActivities as $activity): ?>
            <div class="news-item">
                <h3 class="news-title"><?php echo htmlspecialchars($activity['titre']); ?></h3>
                <p class="news-description"><?php echo htmlspecialchars($activity['description']); ?></p>
                <p class="news-date"><?php echo htmlspecialchars($activity['date']); ?></p>
            </div>
        <?php endforeach; ?>
    </div>

    <a class="view-all-link" href="/Projet_WEB/public/index.php/activites">Voir toutes les nouvelles</a>
</section>


        

        <section class="main-content">
    <div class="members-benefits">
    <h2 class="section-title">Avantages pour les Membres</h2>

    <div class="advantages">
        <?php foreach ($avantages as $avantage): ?>
            <div class="advantage-item">
                <h3 class="advantage-title"><?php echo htmlspecialchars($avantage['titre']); ?></h3>
                <p class="advantage-description"><?php echo htmlspecialchars($avantage['description']); ?></p>
                <p class="advantage-deadline">Date limite : <?php echo htmlspecialchars($avantage['deadline']); ?></p>
                <p class="advantage-partner">Partenaire : <?php echo htmlspecialchars($avantage['partenaire_nom']); ?></p>
            </div>
        <?php endforeach; ?>
    </div>


        <table>
            <tr>
                <th>Nom</th>
                <th>Wilaya</th>
                <th>Categorie</th>
                <th>Remise Premium</th>
                <th>Remise Jeune</th>
                <th>Remise Classique</th>
            </tr>
            <?php foreach ($partners as $partner): ?>
                <tr>
                    <td><?php echo htmlspecialchars($partner['nom']); ?></td>
                    <td><?php echo htmlspecialchars($partner['wilaya']); ?></td>
                    <td><?php echo htmlspecialchars($partner['categorie']); ?></td>
                    <td><?php echo htmlspecialchars($partner['remiseP']); ?>%</td>
                    <td><?php echo htmlspecialchars($partner['remiseJ']); ?>%</td>
                    <td><?php echo htmlspecialchars($partner['remiseC']); ?>%</td>
                </tr>
            <?php endforeach; ?>
        </table>

        <div class="pagination">
    <?php if ($page > 1): ?>
        <a class="view-all-link" href="?page=<?php echo $page - 1; ?>">Précédent</a>
    <?php endif; ?>

    <?php if ($page < $totalPages): ?>
        <a class="view-all-link" href="?page=<?php echo $page + 1; ?>">Suivant</a>
    <?php endif; ?>
</div>

<a class="view-all-link" href="/Projet_WEB/public/index.php/avantages">Voir tous les avantages</a>

    </div>

    <div class="limited-partners">
    <h2>Nos Partenaires</h2>
    <div class="partner-logos">
        <?php foreach ($partnerss as $partner): ?>
            <div class="partner-logo">
                <img src="<?php echo htmlspecialchars($partner['logo']); ?>" alt="<?php echo htmlspecialchars($partner['nom']); ?>" class="partner-image">
            </div>
        <?php endforeach; ?>
    </div>
</div>

</section>


    <?php include __DIR__ . '/../layouts/footer.php'; ?>

    
</body>
</html>
