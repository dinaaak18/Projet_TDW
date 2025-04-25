<?php

namespace app\controllers;

use app\models\Membre;  
use app\helpers\session;

class CompteController {

    
    public function index() {
       
        if (!session::has('id')) {
            header('Location: /Projet_WEB/public/index.php/login');
            exit;
        }

        $userId = session::get('id');

        $database = \app\models\Database::getInstance()->getConnection();

        $membreModel = new Membre($database);
        $user = $membreModel->getUserById($userId);

        require_once __DIR__ . '/../views/compte/index.php';
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = session::get('id');
            $nom = $_POST['nom'] ?? '';
            $prenom = $_POST['prenom'] ?? '';
            $adresse = $_POST['adresse'] ?? '';
            $profession = $_POST['profession'] ?? '';
            $password = $_POST['password'] ?? '';
            $newPassword = $_POST['new_password'] ?? '';
            
            $database = \app\models\Database::getInstance()->getConnection();
            $membreModel = new Membre($database);

            $user = $membreModel->getUserById($userId);
            if (password_verify($password, $user['password'])) {
                if (!empty($newPassword)) {
                    $newPassword = password_hash($newPassword, PASSWORD_BCRYPT);
                } else {
                    $newPassword = $user['password'];  
                }

                $membreModel->updateUser($userId, $nom, $prenom, $adresse, $profession, $newPassword);

               
                header('Location: /Projet_WEB/public/index.php/home');
                exit;
            } else {
            
                echo "Mot de passe actuel incorrect.";
            }
        }
    }
}
