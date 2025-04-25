<?php

namespace app\controllers;

use app\helpers\Session;
use app\models\Aide;
use app\models\TypeAide;

require_once __DIR__ . '/../models/Aide.php';
require_once __DIR__ . '/../models/TypeAide.php';

class AideController
{

    public function index()
    {
        $types = TypeAide::getAllTypes();
        require_once __DIR__ . '/../views/aide/index.php';
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
           
            $userId = Session::get('id'); 
            $nom = $_POST['nom'] ?? '';
            $prenom = $_POST['prenom'] ?? '';
            $dateNaiss = $_POST['datenaiss'] ?? '';
            $typeAide = $_POST['typeaide'] ?? '';
            $description = $_POST['description'] ?? '';

            $uploadDir = __DIR__ . '/../../public/uploads/';
            $uploadedFile = $_FILES['dossier'] ?? null;
            $filePath = '';

            if ($uploadedFile && $uploadedFile['error'] === UPLOAD_ERR_OK) {
                $fileName = uniqid('aide_') . '.zip';
                $filePath = $uploadDir . $fileName;

                if (!move_uploaded_file($uploadedFile['tmp_name'], $filePath)) {
                    die('Erreur lors de l\'enregistrement du fichier.');
                }

                $filePath = '/uploads/' . $fileName;
            }

            
            $aideModel = new Aide();
            $aideModel->createAide($userId, $nom, $prenom, $dateNaiss, $typeAide, $description, $filePath);
            $this->index();
            exit;
        }
    }

    
}
