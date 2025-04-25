<?php

namespace app\controllers;

use app\models\Partenaire;
use app\models\Database;
use app\models\ParteFav;
use app\helpers\session;
require_once __DIR__ . '/../models/ParteFav.php';


class CatalogueController
{
    public function index()
    {
        $database = Database::getInstance()->getConnection();

        $categoryFilter = $_GET['category'] ?? '';
        $wilayaFilter = $_GET['wilaya'] ?? '';
        $sortOrder = $_GET['sort_order'] ?? 'ASC';

        $partenaireModel = new Partenaire($database);
        $partners = $partenaireModel->getFilteredPartners($categoryFilter, $wilayaFilter, $sortOrder);

        $groupedPartners = [];
        foreach ($partners as $partner) {
            $groupedPartners[$partner['categorie']][] = $partner;
        }
        $categories = $partenaireModel->getCategories();

        $wilayas = $partenaireModel->getWilayas();

        require_once __DIR__ . '/../views/catalogue/index.php';
    }

    public function filter()
    {
        $database = Database::getInstance()->getConnection();

        $categoryFilter = $_GET['category'] ?? '';
        $wilayaFilter = $_GET['wilaya'] ?? '';
        $sortOrder = $_GET['sort_order'] ?? 'ASC';

        $partenaireModel = new Partenaire($database);
        $partners = $partenaireModel->getFilteredPartners($categoryFilter, $wilayaFilter, $sortOrder);

        echo json_encode($partners);
    }

    public function addFavorite()
    {
        $database = Database::getInstance()->getConnection();

        $userId = Session::get('id');
        if (!$userId) {
            header('Location: /Projet_WEB/public/index.php/login');
            exit;
        }

        $partenaireId = $_POST['partenaire_id'] ?? null;

        $ParteModel = new ParteFav($database);
        $result = $ParteModel::addFavorite($userId, $partenaireId);

        switch ($result) {
            case "success":
                echo "success";
                break;
            case "already_exists":
                echo "already_exists";
                break;
            case "missing_data":
                echo "missing_id";
                break;
            case "error":
            case "db_error":
            default:
                echo "error";
                break;
        }
    }


    public function showMore()
{
    $partenaireId = $_POST['partenaire_id'] ?? $_GET['partenaire_id'] ?? null;
    if (!$partenaireId) {
        header('Location: /Projet_WEB/public/index.php/catalogue');
        exit;
    }

    $database = Database::getInstance()->getConnection();

    $partenaireModel = new Partenaire($database);
    $partnerDetails = $partenaireModel->getPartnerDetails($partenaireId);

    if (!$partnerDetails) {
        $_SESSION['error'] = "Partenaire introuvable.";
        header('Location: /Projet_WEB/public/index.php/catalogue');
        exit;
    }

    require_once __DIR__ . '/../views/catalogue/ParteDetails.php';
}

    

}
