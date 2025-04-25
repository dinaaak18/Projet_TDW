<?php

namespace app\controllers;

use app\models\Partenaire;  
use app\models\Database;  


class GestionPartenaireController
{

    public function index()
    {
        $database = Database::getInstance()->getConnection();
        $partenaireModel = new Partenaire($database);
        $partners = $partenaireModel->getEveryPartner();
        include __DIR__ . '/../views/partners/list.php';
    }
    public function ad(){
        include __DIR__ . '/../views/partners/add.php';

    }
    public function add()
    {
        $database = Database::getInstance()->getConnection();
        $partenaireModel = new Partenaire($database);
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $photoPath = $this->uploadFile($_FILES['photo'], 'photo');
            $logoPath = $this->uploadFile($_FILES['logo'], 'logo');
    
            $data = [
                'nom' => $_POST['nom'],
                'categorie' => $_POST['categorie'],
                'wilaya' => $_POST['wilaya'],
                'remiseP' => $_POST['remiseP'],
                'remiseJ' => $_POST['remiseJ'],
                'remiseC' => $_POST['remiseC'],
                'contact' => $_POST['contact'],
                'adresse' => $_POST['adresse'],
                'photo' => $photoPath,
                'logo' => $logoPath,
                'description' => $_POST['description'],
                'username' => $_POST['username'],
                'password' => password_hash($_POST['password'], PASSWORD_DEFAULT) 
            ];
    
           
            $partenaireModel->addPartner($data);
            $this->index();
        } else {
            include __DIR__ . '/../views/partners/add.php';
        }
    }
    

    public function delete()
{
    $database = Database::getInstance()->getConnection();
    $partenaireModel = new Partenaire($database);
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
        $id = intval($_POST['id']); 

        
        $partenaireModel->deletePartner($id);

        header('Location: /Projet_WEB/public/index.php/partners');
        exit;
    } else {
        header('Location: /Projet_WEB/public/index.php/partners');
        exit;
    }
}
public function edit()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
        $id = intval($_POST['id']);
        $database = Database::getInstance()->getConnection();
        $partenaireModel = new Partenaire($database);
        $partner = $partenaireModel->getPartnerById($id); 

        if ($partner) {
            include __DIR__ . '/../views/partners/edit.php'; 
        } else {
            echo "Partenaire non trouvé.";
        }
    } else {
        echo "Requête invalide ou ID manquant.";
    }
}

    public function update()
{
    $database = Database::getInstance()->getConnection();
    $partenaireModel = new Partenaire($database);
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
        $id = $_POST['id'];

        $partner = $partenaireModel->getPartnerById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nom'])) {
            $data = [
                'nom' => $_POST['nom'],
                'categorie' => $_POST['categorie'],
                'wilaya' => $_POST['wilaya'],
                'remiseP' => $_POST['remiseP'],
                'remiseJ' => $_POST['remiseJ'],
                'remiseC' => $_POST['remiseC'],
                'contact' => $_POST['contact'],
                'adresse' => $_POST['adresse'],
                'description' => $_POST['description']
            ];

            if (!empty($_FILES['photo']['name'])) {
                $data['photo'] = $this->uploadFile($_FILES['photo'], 'photo');
            }

            if (!empty($_FILES['logo']['name'])) {
                $data['logo'] = $this->uploadFile($_FILES['logo'], 'logo');
            }

            $partenaireModel->updatePartner($id, $data);
            $this->index();

        } else {
            include __DIR__ . '/../views/partners/edit.php';
        }
    }
}


private function uploadFile($file, $type) {
    $uploadDir = __DIR__ . '/../../public/uploads/';

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $fileName = time() . '_' . basename($file['name']);
    $destination = $uploadDir . $fileName;

    if (move_uploaded_file($file['tmp_name'], $destination)) {
        return '/uploads/' . $fileName; 
    } else {
        throw new Exception("Erreur lors du téléchargement du fichier.");
    }
}

}
