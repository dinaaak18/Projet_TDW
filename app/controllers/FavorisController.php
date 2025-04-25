<?php

namespace app\controllers;


use app\models\ParteFav;
use app\models\Partenaire;
use app\models\Database;
use app\helpers\session;


require_once __DIR__ . '/../models/ParteFav.php';
require_once __DIR__ . '/../models/Partenaire.php';

class FavorisController
{
public function favorites()
{
    $userId = Session::get('id');
    if (!$userId) {
        header('Location: /Projet_WEB/public/index.php/login');
        exit;
    }

    $database = Database::getInstance()->getConnection();

    $parteFavModel = new ParteFav($database);
    $favoritePartners = $parteFavModel->getFavoritePartners($userId);

    require_once __DIR__ . '/../views/catalogue/ParteFav.php';
}
public function removeFavorite()
{
    $userId = Session::get('id');
    if (!$userId) {
        echo json_encode(['status' => 'error', 'message' => 'Utilisateur non connecté.']);
        return;
    }

    $partnerId = $_POST['partner_id'] ?? null;

    if (!$partnerId) {
        echo json_encode(['status' => 'error', 'message' => 'Partenaire non spécifié.']);
        return;
    }

    $database = Database::getInstance()->getConnection();
    $parteFavModel = new ParteFav($database);

    $isRemoved = $parteFavModel->removeFavorite($userId, $partnerId);

    if ($isRemoved) {
        echo json_encode(['status' => 'success', 'message' => 'Partenaire retiré des favoris.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Une erreur est survenue.']);
    }
}

}