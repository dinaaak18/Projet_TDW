<?php

namespace app\models;

use app\models\Database;
use PDO;

class Aide
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function createAide($userId, $nom, $prenom, $dateNaiss, $typeAide, $description, $filePath)
    {
        $query = "
            INSERT INTO Aide (user, nom, prenom, datenais, typeaide, description, etat, dossier) 
            VALUES (:user, :nom, :prenom, :datenais, :typeaide, :description, :etat, :dossier)
        ";
        $stmt = $this->db->prepare($query);
        $stmt->execute([
            ':user' => $userId,
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':datenais' => $dateNaiss,
            ':typeaide' => $typeAide,
            ':description' => $description,
            ':etat' => 'En attente', // etat par def
            ':dossier' => $filePath,
        ]);
    }
    public function getAidesEnAttente()
    {
        $query = "SELECT * FROM Aide WHERE etat IS NULL OR etat = 'En attente'";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
