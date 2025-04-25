<?php

namespace app\controllers;

use app\models\Benevolat;
use app\models\Benevstat;
use app\models\Database;

class GestionBenevolatController
{
    public function index()
    {
        $database = Database::getInstance()->getConnection();
        
        $benevolatModel = new Benevolat($database);
        $benevolats = $benevolatModel->getPendingBenevolats();
        
        $benevstatModel = new Benevstat($database);
        $stat = $benevstatModel->getStat(); 

        include __DIR__ . '/../views/benevolat/list.php';  
    }

    public function confirmer()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $benevolatId = $_POST['benevolat_id'];

            $database = Database::getInstance()->getConnection();
            $benevolatModel = new Benevolat($database);

            if ($benevolatModel->confirmerBenevolat($benevolatId)) {
                $this->index();
                exit;
            } else {
                echo "Erreur lors de la confirmation du bénévolat.";
            }
        } else {
            echo "Méthode non autorisée.";
        }
    }
}
