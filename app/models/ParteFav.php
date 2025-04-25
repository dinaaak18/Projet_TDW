<?php

namespace app\models;

use PDO;

class ParteFav
{
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public static function addFavorite($userId, $partenaireId)
    {
        if (!$userId || !$partenaireId) {
            return "missing_data";
        }

        try {
            // Connexion à la base de données
            $database = Database::getInstance()->getConnection();

            // Vérifier si le couple existe déjà
            $stmtCheck = $database->prepare("SELECT COUNT(*) FROM ParteFav WHERE membre_id = :user_id AND partenaire_id = :partenaire_id");
            $stmtCheck->bindParam(':user_id', $userId, PDO::PARAM_INT);
            $stmtCheck->bindParam(':partenaire_id', $partenaireId, PDO::PARAM_INT);
            $stmtCheck->execute();

            if ($stmtCheck->fetchColumn() > 0) {
                return "already_exists"; // Le couple existe déjà
            }

            // Insérer dans la table ParteFav
            $stmtInsert = $database->prepare("INSERT INTO ParteFav (membre_id, partenaire_id) VALUES (:user_id, :partenaire_id)");
            $stmtInsert->bindParam(':user_id', $userId, PDO::PARAM_INT);
            $stmtInsert->bindParam(':partenaire_id', $partenaireId, PDO::PARAM_INT);

            if ($stmtInsert->execute()) {
                return "success";
            } else {
                return "error";
            }
        } catch (PDOException $e) {
            // Gestion des erreurs
            error_log($e->getMessage());
            return "db_error";
        }
    }

    public function getFavoritePartners($userId)
{
    $query = "
        SELECT p.nom, p.id 
        FROM ParteFav pf
        JOIN Partenaire p ON pf.partenaire_id = p.id
        WHERE pf.membre_id = :user_id
    ";

    $stmt = $this->db->prepare($query);
    $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function removeFavorite($userId, $partnerId)
{
    $query = "DELETE FROM ParteFav WHERE membre_id = :user_id AND partenaire_id = :partner_id";
    $stmt = $this->db->prepare($query);
    $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
    $stmt->bindParam(':partner_id', $partnerId, PDO::PARAM_INT);
    return $stmt->execute();
}

}
