<?php
require_once __DIR__ . '/controllers/LoginController.php';
require_once __DIR__ . '/controllers/HomeController.php';
require_once __DIR__ . '/controllers/CatalogueController.php';
require_once __DIR__ . '/controllers/ActiviteController.php';
require_once __DIR__ . '/controllers/CarteController.php';
require_once __DIR__ . '/controllers/CompteController.php';
require_once __DIR__ . '/controllers/DonController.php';
require_once __DIR__ . '/controllers/AideController.php';
require_once __DIR__ . '/controllers/AvantageController.php';
require_once __DIR__ . '/controllers/FavorisController.php';
require_once __DIR__ . '/controllers/HistoriqueController.php';
require_once __DIR__ . '/controllers/AdminController.php';
require_once __DIR__ . '/controllers/GestionPartenaireController.php';
require_once __DIR__ . '/controllers/GestionDonController.php';
require_once __DIR__ . '/controllers/GestionBenevolatController.php';
require_once __DIR__ . '/controllers/GestionAideController.php';
require_once __DIR__ . '/controllers/GestionNotificationController.php';
require_once __DIR__ . '/controllers/GestionActiviteController.php';
require_once __DIR__ . '/controllers/GestionMembreController.php';
require_once __DIR__ . '/controllers/PartenaireController.php';



$routes = [
    'home' => 'HomeController@index',
    'login' => 'LoginController@showLoginForm',
    'logout' => 'LoginController@logout',
    'catalogue' => 'CatalogueController@index',
    'activites' => 'ActiviteController@index',
    'participer' => 'ActiviteController@participer',
    'connecter' => 'LoginController@login',
    'logout' => 'LoginController@logout',
    'register' => 'LoginController@showRegisterForm',
    'inscrire' => 'LoginController@register',
    'demandeCarte' => 'CarteController@showCarteForm',
    'inscriptioncarte' => 'CarteController@submitCarteForm',
    'compte' => 'CompteController@index',
    'compte/update' => 'CompteController@update',
    'don' => 'DonController@index', 
    'don/store' => 'DonController@store',
    'don/success' => 'DonController@success',
    'aide' => 'AideController@index', 
    'aide/store' => 'AideController@store', 
    'aide/success' => 'AideController@success',
    'avantages' => 'AvantageController@index',
    'addFavorite' => 'CatalogueController@addFavorite',
    'showMore' => 'CatalogueController@showMore',
    'favoris' => 'FavorisController@favorites',
    'removeFavorite' => 'FavorisController@removeFavorite',
    'admin' => 'AdminController@index',
    'partners' => 'GestionPartenaireController@index', 
    'partners/add' => 'GestionPartenaireController@add',
    'partners/edit' => 'GestionPartenaireController@edit', 
    'partners/update' => 'GestionPartenaireController@update', 
    'partners/delete' => 'GestionPartenaireController@delete',
    'gestiondon'=> 'GestionDonController@index',
    'dons/approuver' => 'GestionDonController@approuver', 
    'dons/terminer' => 'GestionDonController@terminer',
    'dons/voirRecu' => 'GestionDonController@voirRecu',
    'gestionbenevolat' => 'GestionBenevolatController@index',
    'benevolat/confirmer' => 'GestionBenevolatController@confirmer',
    'gestionaide' => 'GestionAideController@index',
    'aides/voirDossier' => 'GestionAideController@voirDossier',
    'gestionnotif' => 'GestionNotificationController@index',
    'notifications/add' => 'GestionNotificationController@add',
    'gestionactivite' => 'GestionActiviteController@index',
    'activites/add' => 'GestionActiviteController@add',
    'historique' => 'HistoriqueController@index',
    'gestionmembres' => 'GestionMembreController@index',
    'membres/approuver' => 'GestionMembreController@approuver',
    'part' => 'PartenaireController@index',
    'membre/rechercher' => 'PartenaireController@rechercher'


    
];
