<?php
namespace app\controllers;

use app\models\Notification;
use app\models\Database;

require_once __DIR__ . '/../models/Notification.php';

class GestionNotificationController
{
    public function index()
    {
        include __DIR__ . '/../views/notifications/add.php';
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titre = $_POST['titre'];
            $contenu = $_POST['contenu'];

            $database = Database::getInstance()->getConnection();
            $notificationModel = new Notification($database);

            $notificationModel->addNotification($titre, $contenu);

            header("Location: /Projet_WEB/public/index.php/admin"); 
            exit;
        }
    }
}
