<?php


namespace app\models;

use app\models\Database;

use PDO;

class Benevolat
{
    private $db;

    public function __construct($db) {
        $this->db = $db;    }


    public static function participer($membreId, $activiteId)
    { 
        $db = Database::getInstance()->getConnection();  
        $stmt = $db->prepare("INSERT INTO Benevolat (membre_id, activite_id) VALUES (:membre_id, :activite_id)");
        $stmt->bindParam(':membre_id', $membreId, PDO::PARAM_INT);
        $stmt->bindParam(':activite_id', $activiteId, PDO::PARAM_INT);

        return $stmt->execute();
    
    }
    public function getPendingBenevolats()
{
    $query = "
        SELECT 
            Benevolat.id AS benevolat_id,
            Benevolat.etat,
            Membre.nom AS membre_nom,
            Activite.titre AS activite_nom
        FROM 
            Benevolat
        JOIN 
            Membre ON Membre.id = Benevolat.membre_id
        JOIN 
            Activite ON Activite.id = Benevolat.activite_id
        WHERE 
            Benevolat.etat IS NULL OR Benevolat.etat = 'En attente'
    ";

    $stmt = $this->db->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
public function confirmerBenevolat($benevolatId)
{
    $query = "UPDATE Benevolat SET etat = 'Confirmé' WHERE id = :benevolat_id";
    $stmt = $this->db->prepare($query);
    $stmt->bindParam(':benevolat_id', $benevolatId, PDO::PARAM_INT);
    return $stmt->execute();
}
public function getUserBenevolats($userId)
    {
        $query = "SELECT 
                      Activite.titre, 
                      Activite.description, 
                      Activite.lieu, 
                      Activite.date, 
                      Benevolat.etat 
                  FROM Benevolat
                  JOIN Activite ON Benevolat.activite_id = Activite.id
                  WHERE Benevolat.membre_id = :userId";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
