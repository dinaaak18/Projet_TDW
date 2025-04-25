<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Projet_WEB/public/css/styles.css">

    <title>Page d'admin - Association</title>
</head>
<body>
<?php use app\helpers\session; ?>

<header>
    <div class="header-container">
        <img src="/Projet_WEB/public/assets/images/logo.jpg" alt="Logo de l'association" class="logo">


        <div class="social-links">
            <a href="https://www.facebook.com/" target="_blank">
                <img src="/Projet_WEB/public/assets/images/facebook.png" alt="Facebook">
            </a>
            <a href="https://www.instagram.com/" target="_blank">
                <img src="/Projet_WEB/public/assets/images/instagram.jpeg" alt="Instagram">
            </a>
            <a href="https://www.x.com/" target="_blank">
                <img src="/Projet_WEB/public/assets/images/x.png" alt="X">
            </a>
           
                <img src="/Projet_WEB/public/assets/images/compte.png" alt="Compte" id="account-toggle">
                <ul class="dropdown" id="account-dropdown">
                    <?php if (Session::get('id')): ?>                       
                        <li><a href="/Projet_WEB/public/index.php/logout">Déconnexion</a></li>
                    <?php else: ?>
                        <li><a href="/Projet_WEB/public/index.php/login">Se connecter</a></li>
                        <li><a href="/Projet_WEB/public/index.php/register">S'inscrire</a></li>
                    <?php endif; ?>
                </ul>
            
        </div>
    </div>
</header>
<?php if (Session::get('id')): ?>  
<nav class="navbar">
    <ul>
        <li><a href="/Projet_WEB/public/index.php/partners">Gestion Partenaires</a></li>
        <li><a href="/Projet_WEB/public/index.php/gestionmembres">Gestion Membres</a></li>
        <li><a href="/Projet_WEB/public/index.php/gestiondon">Gestion Dons</a></li>
        <li><a href="/Projet_WEB/public/index.php/gestionbenevolat">Gestion Benevolats</a></li>
        <li><a href="/Projet_WEB/public/index.php/gestionaide">Gestion Aides</a></li>
        <li><a href="/Projet_WEB/public/index.php/gestionnotif">Gestion Notifications</a></li>
        <li><a href="/Projet_WEB/public/index.php/gestionactivite">Gestion Activités</a></li>
    </ul>
</nav>
<?php else: ?>
                       
<?php endif; ?>
<script>
    document.addEventListener('DOMContentLoaded', () => {
    const accountToggle = document.getElementById('account-toggle');
    const accountDropdown = document.getElementById('account-dropdown');

    if (accountToggle && accountDropdown) {
        accountToggle.addEventListener('click', () => {
            const isVisible = accountDropdown.style.display === 'block';
            accountDropdown.style.display = isVisible ? 'none' : 'block';
        });

        document.addEventListener('click', (event) => {
            if (
                !accountDropdown.contains(event.target) &&
                !accountToggle.contains(event.target)
            ) {
                accountDropdown.style.display = 'none';
            }
        });
    }
});
</script>
