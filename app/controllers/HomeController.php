<?php

namespace app\controllers;

use app\models\Activite;
use app\models\Database;
use app\models\Partenaire;
use app\models\Avantage;
use app\helpers\session;

require_once __DIR__ . '/../models/Database.php';
require_once __DIR__ . '/../models/Activite.php';
require_once __DIR__ . '/../models/Partenaire.php';
require_once __DIR__ . '/../helpers/session.php';


class HomeController {

    public function index() {
        $database = \app\models\Database::getInstance()->getConnection();
        $isUserLoggedIn = Session::has('user');

        $activiteModel = new Activite($database);
        $recentActivities = $activiteModel->getRecentActivities(3);

        $partenaireModel = new Partenaire($database);
        $limit = 50;
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $offset = ($page - 1) * $limit;

        $partners = $partenaireModel->getPartners($limit, $offset);
        $partnerss = $partenaireModel->getLimitedPartnersWithPhotos(3);
        $partnersPhotos = $partenaireModel->getLimitedPartnersWithPhootos(8);

        $totalPartners = $partenaireModel->getTotalPartners();
        $totalPages = ceil($totalPartners / $limit);

        $avantageModel = new Avantage($database);
        $avantages = $avantageModel->getLimitedAvantages(3);

        require_once __DIR__ . '/../views/home/index.php';
    }
}




