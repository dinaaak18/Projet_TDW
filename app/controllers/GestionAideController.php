<?php
namespace app\controllers;

use app\models\Aide;
use app\models\Database;

require_once __DIR__ . '/../models/Aide.php';

class GestionAideController
{
    public function index()
    {
        $database = Database::getInstance()->getConnection();
        $aideModel = new Aide($database);
        $aides = $aideModel->getAidesEnAttente();
        include __DIR__ . '/../views/aide/list.php';
    }

    public function voirDossier()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dossierPath = $_POST['dossierPath'];
            echo ($dossierPath);
           
            $safePath = realpath(__DIR__ . '/../../public' . $dossierPath);
            if ($safePath && file_exists($safePath)) {
                $mimeType = mime_content_type($safePath);

                if ($mimeType === 'application/zip') {
                    header('Content-Type: application/zip');
                    header('Content-Disposition: inline; filename="' . basename($safePath) . '"');
                    readfile($safePath);
                    exit;
                } else {
                    echo "Ce n'est pas un fichier ZIP valide.";
                }
            } else {
                echo "Fichier introuvable ou chemin invalide.";
            }
        }
    }
}
