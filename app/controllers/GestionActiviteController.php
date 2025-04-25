<?php

namespace app\controllers;

use app\models\Activite;
use app\models\Database;

require_once __DIR__ . '/../models/Activite.php';

class GestionActiviteController
{
    public function index()
    {
        include __DIR__ . '/../views/activites/add.php';
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titre = $_POST['titre'];
            $description = $_POST['description'];
            $date = $_POST['date'];
            $lieu = $_POST['lieu'];
            $type = $_POST['type'];

            $database = Database::getInstance()->getConnection();
            $activiteModel = new Activite($database);

            $activiteModel->addActivite($titre, $description, $date, $lieu, $type);

            header("Location: /Projet_WEB/public/index.php/activites");
            exit;
        }
    }
}
