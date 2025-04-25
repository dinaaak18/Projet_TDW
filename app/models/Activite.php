<?php

namespace app\models;

use PDO;

class Activite {

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getRecentActivities() { //pour l;affichage dans l'accueil
        $query = "SELECT titre, description, date FROM Activite ORDER BY date DESC LIMIT 3";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllActivities() {
        $sql = "SELECT * FROM activite ORDER BY date DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function addActivite($titre, $description, $date, $lieu, $categorie)
    {
        $query = "INSERT INTO Activite (titre, description, date, lieu, categorie) 
                  VALUES (:titre, :description, :date, :lieu, :categorie)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':lieu', $lieu);
        $stmt->bindParam(':categorie', $categorie);
        $stmt->execute();
    }
}
