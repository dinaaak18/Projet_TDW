<?php

namespace app\models;

use PDO;

class Avantage
{
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAvantages()
    {
        $query = "
            SELECT 
                Avantage.titre, 
                Avantage.description, 
                Avantage.deadline, 
                Partenaire.nom AS partenaire_nom
            FROM 
                Avantage
            LEFT JOIN 
                Partenaire 
            ON 
                Avantage.partenaire = Partenaire.id
        ";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getLimitedAvantages($limit) {
        $query = "
            SELECT 
                Avantage.titre, 
                Avantage.description, 
                Avantage.deadline, 
                Partenaire.nom AS partenaire_nom
            FROM 
                Avantage
            LEFT JOIN 
                Partenaire 
            ON 
                Avantage.partenaire = Partenaire.id
            LIMIT :limit
        ";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
