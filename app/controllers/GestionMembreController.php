<?php
namespace app\controllers;
use PDO;
use app\models\Membre;
use app\models\Database;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\Label\Alignment\LabelAlignmentCenter;
use Endroid\QrCode\Label\Font\NotoSans;
use Endroid\QrCode\Writer\PngWriter;


require_once __DIR__ . '/../models/Membre.php';

class GestionMembreController
{
    public function index()
    {
        $database = Database::getInstance()->getConnection();
        $membreModel = new Membre($database);
        $membres = $membreModel->getMembresAApprouver();
        include __DIR__ . '/../views/membres/list.php';
    }

    public function approuver()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $database = Database::getInstance()->getConnection();
        $membreModel = new Membre($database);

        $membreModel->approuverMembre($id);

        $membre = $this->getMembreDetails($id);

        $qrCode = Builder::create() //generation de code qr
            ->writer(new PngWriter())
            ->data($membre['id'] . ' ' . $membre['nom'] . ' ' . $membre['prenom'] . ' ' . $membre['cartetype'])
            ->encoding(new Encoding('UTF-8'))
            ->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
            ->size(300)
            ->margin(10)
            ->labelText('QR Code')
            ->labelFont(new NotoSans(16))
            ->labelAlignment(new LabelAlignmentCenter())
            ->build();

        $qrFilePath = '/Projet_WEB/public/uploads/qrcodes/' . $id . '.png';

$qrCodeDirectory = '/Projet_WEB/public/uploads/qrcodes';
if (!is_dir($qrCodeDirectory)) {
    mkdir($qrCodeDirectory, 0775, true); 

$qrCode->saveToFile($_SERVER['DOCUMENT_ROOT'] . $qrFilePath);

        $cartePath = $this->createCarteAdhesion($membre, $qrFilePath);

        $membreModel->updateCarteAdhesion($id, $cartePath);

        header('Location: /Projet_WEB/public/index.php/gestionmembres');
    }
}
}

    private function getMembreDetails($id)
    {  $database = Database::getInstance()->getConnection();
        $query = "SELECT * FROM Membre WHERE id = :id";
        $stmt = $database->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createCarteAdhesion($membre, $qrFilePath) //creation de la carte
{
    $cartePath = '/Projet_WEB/public/uploads/cartes/' . $membre['id'] . '_carte.png';
    $fullPath = $_SERVER['DOCUMENT_ROOT'] . $cartePath;

    $carteWidth = 800; 
    $carteHeight = 600; 

    $image = imagecreate($carteWidth, $carteHeight);

    $backgroundColor = imagecolorallocate($image, 255, 255, 255); 
    $textColor = imagecolorallocate($image, 0, 0, 0);             

    imagestring($image, 5, 20, 20, 'Nom: ' . $membre['nom'], $textColor);
    imagestring($image, 5, 20, 50, 'Prenom: ' . $membre['prenom'], $textColor);
    imagestring($image, 5, 20, 80, 'Carte: ' . $membre['cartetype'], $textColor);

    $qrImage = imagecreatefrompng($_SERVER['DOCUMENT_ROOT'] . $qrFilePath);

    $qrWidth = imagesx($qrImage);
    $qrHeight = imagesy($qrImage);

    $qrX = ($carteWidth - $qrWidth) / 2; 
    $qrY = ($carteHeight - $qrHeight) / 2; 

    imagecopy($image, $qrImage, $qrX, $qrY, 0, 0, $qrWidth, $qrHeight);

    if (imagepng($image, $fullPath)) {
        error_log("Carte sauvegardée avec succès à : " . $fullPath);
    } else {
        error_log("Erreur lors de la sauvegarde de la carte à : " . $fullPath);
    }

    imagedestroy($image);
    imagedestroy($qrImage);

    return $cartePath;
}

}

