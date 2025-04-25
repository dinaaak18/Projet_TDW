<?php

namespace app\controllers;

use app\models\Don;
use app\models\Donstat;
use app\models\Database;
use app\helpers\Session;

require_once __DIR__ . '/../models/Don.php';
require_once __DIR__ . '/../models/Donstat.php';


class DonController
{
    public function index()
    {
        require_once __DIR__ . '/../views/don/index.php';
    }

    public function store()
    {
        $userId = Session::get('id'); 
        if (!$userId) {
            header('Location: /Projet_WEB/public/index.php/login');
            exit;
        }

       
        $amount = $_POST['amount'] ?? null;
        $uploadDir = __DIR__ . '/../../public/uploads/';

        if ($amount && isset($_FILES['receipt']) && $_FILES['receipt']['error'] === UPLOAD_ERR_OK) {
            
            $fileName = uniqid() . '_' . basename($_FILES['receipt']['name']); // Nom unique pour éviter les conflits
            $filePath = $uploadDir . $fileName;

            if (move_uploaded_file($_FILES['receipt']['tmp_name'], $filePath)) {
                
                $database = Database::getInstance()->getConnection();
                $donModel = new Don($database);
                $donModel->createDon($userId, $amount, '/uploads/' . $fileName);
                $donstat = new Donstat($database);
                $donstat->incrementStat();  
                header('Location: /Projet_WEB/public/index.php/don/success');
                exit;
            } else {
                echo "Erreur lors du téléversement du fichier.";
            }
        } else {
            echo "Veuillez fournir un montant et un fichier valide.";
        }
    }

    public function success()
    {
        echo "Merci pour votre don !";
    }
}
