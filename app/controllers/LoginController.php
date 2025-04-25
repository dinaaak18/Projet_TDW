<?php


namespace app\controllers;

use app\models\Membre;  
use app\helpers\session;  
use app\models\Database;
use app\models\Admin;
use app\models\Partenaire;
require_once __DIR__ . '/../models/Membre.php';
require_once __DIR__ . '/../models/Admin.php';
require_once __DIR__ . '/../models/Partenaire.php';

class LoginController {


    public function showLoginForm() {
        require_once __DIR__ . '/../views/login/index.php';
    }

    public function login() {
        $database = \app\models\Database::getInstance()->getConnection();
    
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
    
        $membreModel = new Membre($database);
        $user = $membreModel->getUserByUsername($username);
    
        $adminModel = new Admin($database);
        $admin = $adminModel->getAdminByUsername($username);

        $partModel = new Partenaire($database);
        $part = $partModel->getPartByUsername($username);

    
        if ($user && password_verify($password, $user['password'])) {
            \app\helpers\session::set('id', $user['id']);
            \app\helpers\session::set('username', $user['username']);
            \app\helpers\session::set('nom', $user['nom']);
            \app\helpers\session::set('prenom', $user['prenom']);
            
            header('Location: /Projet_WEB/public/index.php/home');
            exit;
        } 
        elseif ($admin && password_verify($password, $admin['password'])) {
            \app\helpers\session::set('id', $admin['id']);
            \app\helpers\session::set('username', $admin['username']);
            \app\helpers\session::set('role', 'admin');
    
            header('Location: /Projet_WEB/public/index.php/admin');
            exit;
        } 
        elseif ($part && password_verify($password, $part['password'])) {
            \app\helpers\session::set('id', $part['id']);
            \app\helpers\session::set('username', $part['username']);    
            header('Location: /Projet_WEB/public/index.php/part');
            exit;
        } 
        else {
            echo 'Nom d\'utilisateur ou mot de passe incorrect.';
        }
    }
    
    public function logout() {
        \app\helpers\session::destroy();
        
        header('Location: /Projet_WEB/public/index.php/home');
        exit;
    }

    public function showRegisterForm() {
        require_once __DIR__ . '/../views/login/register.php';
    }

    public function register() {

        $database = Database::getInstance()->getConnection();
    

        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        $confirmPassword = $_POST['confirm_password'] ?? '';
        $nom = $_POST['nom'] ?? '';
        $prenom = $_POST['prenom'] ?? '';
    
        // Validation des données
        if (empty($username) || empty($password) || empty($confirmPassword) || empty($nom) || empty($prenom)) {
            echo 'Tous les champs sont requis.';
            return;
        }
    
        if ($password !== $confirmPassword) {
            echo 'Les mots de passe ne correspondent pas.';
            return;
        }
    

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $membreModel = new Membre($database);
        if ($membreModel->getUserByUsername($username)) {
            echo 'Ce nom d\'utilisateur existe déjà.';
            return;
        }
    

        $success = $membreModel->createUser($username, $hashedPassword, $nom, $prenom);
    
        if ($success) {
            echo 'Inscription réussie. Vous pouvez maintenant vous connecter.';
            header('Location: /Projet_WEB/public/index.php/login');
            exit;
        } else {
            echo 'Une erreur est survenue. Veuillez réessayer.';
        }
    }
}

