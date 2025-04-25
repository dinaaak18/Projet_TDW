<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Projet_WEB/public/css/styles.css">
    <title>Demande de Carte</title>
</head>
<body>
    <?php include __DIR__ . '/../layouts/navbar.php'; ?>

    <main class="carte-container">
        <h1 class="carte-title">Demande de Carte</h1>

        <form action="/Projet_WEB/public/index.php/inscriptioncarte" method="POST" enctype="multipart/form-data" class="carte-form">
            <div class="form-group">
                <label for="profession">Profession :</label>
                <input type="text" id="profession" name="profession" class="form-input" required>
            </div>

            <div class="form-group">
                <label for="adresse">Adresse :</label>
                <input type="text" id="adresse" name="adresse" class="form-input" required>
            </div>

            <div class="form-group">
                <label for="photo">Photo :</label>
                <input type="file" id="photo" name="photo" class="form-input" accept="image/*" required>
            </div>

            <div class="form-group">
                <label for="carteid">Carte d'identité :</label>
                <input type="file" id="carteid" name="carteid" class="form-input" accept=".pdf,.jpg,.png" required>
            </div>

            <div class="form-group">
                <label for="recu">Reçu de paiement :</label>
                <input type="file" id="recu" name="recu" class="form-input" accept=".pdf,.jpg,.png" required>
            </div>

            <div class="form-group">
                <label for="cartetype">Type de carte :</label>
                <select id="cartetype" name="cartetype" class="form-input" required>
                    <option value="">--Sélectionner un type de carte--</option>
                    <option value="Premium">Premium</option>
                    <option value="Jeune">Jeune</option>
                    <option value="Classique">Classique</option>
                </select>
            </div>

            <button type="submit" class="submit-btn">Soumettre la demande</button>
        </form>

        <section class="carte-types">
            <h2 class="types-title">Types de cartes</h2>
            <ul class="types-list">
                <li><strong>Carte Premium</strong> : 50 000 DA</li>
                <li><strong>Carte Jeune</strong> : 20 000 DA</li>
                <li><strong>Carte Classique</strong> : 10 000 DA</li>
            </ul>
        </section>
    </main>
</body>
</html>