<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Projet_WEB/public/css/styles.css">
    <title>Faire un Don</title>
</head>
<body>
    <?php include __DIR__ . '/../layouts/navbar.php'; ?>

    <main class="donation-container">
        <h1 class="donation-title">Faire un Don</h1>
        
        <form action="/Projet_WEB/public/index.php/don/store" method="POST" enctype="multipart/form-data" class="donation-form">
            <div class="form-group">
                <label for="amount" class="form-label">Montant (DA) :</label>
                <input type="number" id="amount" name="amount" min="1" required class="form-input">
            </div>

            <div class="form-group">
                <label for="receipt" class="form-label">Reçu (PDF ou image) :</label>
                <input type="file" id="receipt" name="receipt" accept=".pdf, .jpg, .png" required class="form-input">
            </div>

            <button type="submit" class="donation-btn">Faire un don</button>
        </form>
    </main>
</body>
</html>