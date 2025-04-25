<?php
namespace app\models;

use PDO;

class Notification
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function addNotification($titre, $contenu)
    {
        $date = date('Y-m-d H:i:s'); 
        $query = "INSERT INTO Notification (titre, contenu, date) VALUES (:titre, :contenu, :date)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':contenu', $contenu);
        $stmt->bindParam(':date', $date);
        $stmt->execute();
    }
}
