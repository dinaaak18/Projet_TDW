<?php

namespace app\controllers;

use app\models\Database;
use app\models\Membre;
use app\helpers\session;

class CarteController {

    public function showCarteForm() {
        $userId = Session::get('id');
        if (!$userId) {
            header('Location: /Projet_WEB/public/index.php/login');
            exit;
        }

        
        $database = Database::getInstance()->getConnection();
        $membreModel = new Membre($database);

        $user = $membreModel->getUserById($userId);

        if ($user['cartetype'] === null && $user['cartedemande'] === null) {
            require_once __DIR__ . '/../views/carte/index.php';
        } else {
            if ($user['approuv'] == 1) {
                echo '<h2>Votre carte est prête :</h2>';
                echo '<img src="' . htmlspecialchars($user['carte']) . '" alt="Carte utilisateur">';
            } else {
                echo 'Vous avez déjà une demande en attente de validation ou une carte active.';
            }       
        }
    }

    public function submitCarteForm() {
        $userId = Session::get('id');
        if (!$userId) {
            header('Location: /Projet_WEB/public/index.php/login');
            exit;
        }
    
        $database = Database::getInstance()->getConnection();
        $profession = $_POST['profession'] ?? '';
        $adresse = $_POST['adresse'] ?? '';
        $cartetype = $_POST['cartetype'] ?? '';
    
        if (empty($cartetype)) {
            echo "Veuillez sélectionner un type de carte.";
            return;
        }
    
        $uploadsDir = __DIR__ . '/../../public/uploads/';
        if (!is_dir($uploadsDir)) {
            mkdir($uploadsDir, 0777, true);
        }
    
        $photoPath = '';
        $carteIdPath = '';
        $recuPath = '';
    
        if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
            $photoPath = $uploadsDir . basename($_FILES['photo']['name']);
            move_uploaded_file($_FILES['photo']['tmp_name'], $photoPath);
            $photoPath = '/uploads/' . basename($_FILES['photo']['name']);
        }
    
        if (isset($_FILES['carteid']) && $_FILES['carteid']['error'] === UPLOAD_ERR_OK) {
            $carteIdPath = $uploadsDir . basename($_FILES['carteid']['name']);
            move_uploaded_file($_FILES['carteid']['tmp_name'], $carteIdPath);
            $carteIdPath = '/uploads/' . basename($_FILES['carteid']['name']);
        }
    
        if (isset($_FILES['recu']) && $_FILES['recu']['error'] === UPLOAD_ERR_OK) {
            $recuPath = $uploadsDir . basename($_FILES['recu']['name']);
            move_uploaded_file($_FILES['recu']['tmp_name'], $recuPath);
            $recuPath = '/uploads/' . basename($_FILES['recu']['name']);
        }
    
        $query = "UPDATE Membre 
                  SET profession = ?, adresse = ?, photo = ?, carteid = ?, recu = ?, cartedemande = ?
                  WHERE id = ?";
        $stmt = $database->prepare($query);
        $stmt->execute([$profession, $adresse, $photoPath, $carteIdPath, $recuPath, $cartetype, $userId]);
    
        header('Location: /Projet_WEB/public/index.php/home');
        exit;
    }
    
}
