<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Projet_WEB/public/css/style.css">
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
                    <?php if (session::get('id')): ?>
                        <li><a href="/Projet_WEB/public/index.php/compte">Mon compte</a></li>
                        <li><a href="/Projet_WEB/public/index.php/demandeCarte">Acheter une carte</a></li>
                        <li><a href="/Projet_WEB/public/index.php/favoris">Partenaires Favoris</a></li>
                        <li><a href="/Projet_WEB/public/index.php/don">Faire un don</a></li>
                        <li><a href="/Projet_WEB/public/index.php/aide">Demander de l'aide</a></li>
                        <li><a href="/Projet_WEB/public/index.php/historique">Historique</a></li>                        
                        <li><a href="/Projet_WEB/public/index.php/logout">Déconnexion</a></li>
                    <?php else: ?>
                        <li><a href="/Projet_WEB/public/index.php/login">Se connecter</a></li>
                        <li><a href="/Projet_WEB/public/index.php/register">S'inscrire</a></li>
                    <?php endif; ?>
                </ul>
            
        </div>
    </div>
</header>
<script src="/Projet_WEB/public/js/script.js"></script>


<nav class="navbar">
    <ul>
        <li><a href="/Projet_WEB/public/index.php/home">Accueil</a></li>
       
        <li><a href="/Projet_WEB/public/index.php/activites">Activités</a></li>
        <li><a href="/Projet_WEB/public/index.php/avantages">Avantages Membres</a></li>
        <li><a href="/Projet_WEB/public/index.php/catalogue">Partenaires</a></li>
    </ul>
</nav>
