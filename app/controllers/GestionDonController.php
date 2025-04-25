<?php

namespace app\controllers;

use app\models\Don;
use app\models\Donstat;
use app\models\Database;

class GestionDonController
{

    public function index()
    {
        $database = Database::getInstance()->getConnection();
        $donModel = new Don($database);
        $donsEnAttente = $donModel->getDonsByEtat('En attente');
        $donsConfirmes = $donModel->getDonsByEtat('Confirmé');
        $donstatModel = new Donstat($database);
        $donstat = $donstatModel->getStat();
        include __DIR__ . '/../views/don/list.php';
    }

    public function approuver()
    {
        if (isset($_POST['id'])) {
            $this->donModel->updateEtat($_POST['id'], 'Confirmé');
           $this->index();
        }
    }

    public function terminer()
    {
        if (isset($_POST['id']) && isset($_POST['utilisation'])) {
            $this->donModel->updateUtilisation($_POST['id'], $_POST['utilisation']);
            $this->donModel->updateEtat($_POST['id'], 'Terminé');
            $this->index();
        }
    }
    public function voirRecu()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $recuPath = $_POST['recuPath'];

        $safePath = realpath(__DIR__ . '/../../public' . $recuPath);
        if ($safePath && file_exists($safePath)) {
            $mimeType = mime_content_type($safePath);

            $allowedMimeTypes = ['application/pdf', 'image/jpeg', 'image/png', 'image/gif'];
            if (in_array($mimeType, $allowedMimeTypes)) {
                header('Content-Type: ' . $mimeType);
                header('Content-Disposition: inline; filename="' . basename($safePath) . '"');
                readfile($safePath);
                exit;
            } else {
                echo "Type de fichier non supporté.";
            }
        } else {
            echo "Fichier introuvable ou chemin invalide.";
        }
    } else {
        echo "Méthode non autorisée.";
    }
}


}
