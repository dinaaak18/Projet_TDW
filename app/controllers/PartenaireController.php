<?php

namespace app\controllers;

use app\models\Membre;
use app\models\Database;

class PartenaireController {
    public function index(){
        require_once __DIR__ . '/../views/part/index.php';

    }
    public function rechercher() {
        $database = Database::getInstance()->getConnection();

        // Vérifiez si la méthode est POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_POST['id']) || empty($_POST['id'])) {
                echo "Veuillez fournir un ID de membre valide.";
                return;
            }

            $membreId = (int)$_POST['id'];
            $membreModel = new Membre($database);

            $membre = $membreModel->getMemberById($membreId);

            if ($membre) {
                echo "Nom : " . htmlspecialchars($membre['nom']);
                echo " Prenom : " . htmlspecialchars($membre['prenom']);
                echo "Carte Type : " . htmlspecialchars($membre['cartetype']);
            } else {
                echo "Aucun membre trouvé avec l'ID fourni.";
            }
        } else {
            echo "Méthode non autorisée.";
        }
    }
}
