<?php
namespace app\controllers;

use app\models\Database;
use app\models\Don;
use app\models\Benevolat;
use app\helpers\session;

require_once __DIR__ . '/../models/Don.php';
require_once __DIR__ . '/../models/Benevolat.php';

class HistoriqueController
{
    public function index()
    {
        
        $userId = Session::get('id');

        $database = Database::getInstance()->getConnection();
        $donModel = new Don($database);
        $benevolatModel = new Benevolat($database);

        $dons = $donModel->getUserDons($userId);
        $benevolats = $benevolatModel->getUserBenevolats($userId);

        include __DIR__ . '/../views/historique/index.php';
    }
}
