<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogue des Partenaires</title>
    <link rel="stylesheet" href="/Projet_WEB/public/css/styles.css">
</head>
<body>
    
    

    <?php include __DIR__ . '/../layouts/navbar.php'; ?>
    

    <section class="filters">
        <label for="category">Catégorie:</label>
        <select name="category" id="category">
            <option value="">Toutes</option>
            <?php foreach ($categories as $category): ?>
                <option value="<?php echo htmlspecialchars($category['categorie']); ?>">
                    <?php echo htmlspecialchars($category['categorie']); ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label for="wilaya">Wilaya:</label>
        <select name="wilaya" id="wilaya">
            <option value="">Toutes</option>
            <?php foreach ($wilayas as $wilaya): ?>
                <option value="<?php echo htmlspecialchars($wilaya['wilaya']); ?>">
                    <?php echo htmlspecialchars($wilaya['wilaya']); ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label for="sort_order">Trier par:</label>
        <select name="sort_order" id="sort_order">
            <option value="ASC">A-Z</option>
            <option value="DESC">Z-A</option>
        </select>
    </section>

    <section class="partners">
    <h2>Partenaires</h2>
    <div id="partner-list">
        <?php foreach ($groupedPartners as $category => $partnersInCategory): ?>
            <div class="partner-category-section">
                <h3><?php echo htmlspecialchars($category); ?></h3>
                <?php foreach ($partnersInCategory as $partner): ?>
                    <div class="partner-card">
                        <h4><?php echo htmlspecialchars($partner['nom']); ?></h4>
                        <p>Wilaya: <?php echo htmlspecialchars($partner['wilaya']); ?></p>
                        <form method="POST" action="/Projet_WEB/public/index.php/addFavorite" class="add-favorite-form">
                            <input type="hidden" name="partenaire_id" value="<?php echo htmlspecialchars($partner['id']); ?>">
                            <button type="submit">Ajouter aux favoris</button>
                        </form>
                        <form method="POST" action="/Projet_WEB/public/index.php/showMore">
                            <input type="hidden" name="partenaire_id" value="<?php echo htmlspecialchars($partner['id']); ?>">
                            <button type="submit">Voir Plus</button>
                        </form>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </div>
</section>


    <?php include __DIR__ . '/../layouts/footer.php'; ?>

    




</body>
</html>
