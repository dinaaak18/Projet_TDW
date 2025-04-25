<?php

namespace app\models;

use PDO;

class Don
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function createDon($memberId, $amount, $receiptPath)
    {
        $query = "INSERT INTO Don (membre_id, montant, recu, etat) VALUES (:membre_id, :montant, :recu, :etat)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':membre_id', $memberId);
        $stmt->bindParam(':montant', $amount);
        $stmt->bindParam(':recu', $receiptPath);

        // Ajouter l'état "En attente"
        $etat = 'En attente';
        $stmt->bindParam(':etat', $etat);

        $stmt->execute();
    }

    public function getDonsByEtat($etat)
    {
        $query = "SELECT * FROM Don WHERE etat = :etat";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':etat', $etat);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateEtat($id, $newEtat)
    {
        $query = "UPDATE Don SET etat = :etat WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':etat', $newEtat);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function updateUtilisation($id, $utilisation)
    {
        $query = "UPDATE Don SET utilisation = :utilisation WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':utilisation', $utilisation);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
    public function getUserDons($userId)
    {
        $query = "SELECT montant, etat, utilisation 
                  FROM Don 
                  WHERE membre_id = :userId";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}
