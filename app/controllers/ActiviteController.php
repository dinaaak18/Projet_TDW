<?php

namespace app\controllers;

use app\models\Database;
use app\models\Activite;
use app\models\Benevolat;
use app\models\Benevstat;

require_once __DIR__ . '/../models/Benevolat.php';
require_once __DIR__ . '/../models/Benevstat.php';

class ActiviteController {

    public function index() {
        $database = Database::getInstance()->getConnection();

        $activiteModel = new Activite($database);

        $activities = $activiteModel->getAllActivities();

        require_once __DIR__ . '/../views/activites/index.php';
    }

    public function participer()
    {
        $database = Database::getInstance()->getConnection();

        if (!isset($_SESSION['id'])) {
            echo "not_logged_in";
            exit;
        }

        $userId = $_SESSION['id'];  
        $activityId = $_POST['activite_id'] ?? null;

        if ($activityId) {
            $benevolat = new Benevolat($database);
            if ($benevolat::participer($userId, $activityId)) {
                $benevstat = new Benevstat($database);
                $benevstat->incrementStat();  
                echo "success";  
            } else {
                echo "error"; 
            }
        } else {
            echo "missing_activity_id";
        }
    }
}
