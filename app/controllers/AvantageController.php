<?php

namespace app\controllers;

use app\models\Avantage;
use app\models\Partenaire;
use app\models\Database;


require_once __DIR__ . '/../models/Avantage.php';
require_once __DIR__ . '/../models/Partenaire.php';

class AvantageController
{
    public function index()
    {
        $database = Database::getInstance()->getConnection();
        $avantageModel = new Avantage($database);
        $avantages = $avantageModel->getAvantages();

        $partenaireModel = new Partenaire($database);
        $limit = 10; 
        $offset = 0; 
        $partners = $partenaireModel->getAllPartners();

        require_once __DIR__ . '/../views/avantage/index.php';
    }
}
