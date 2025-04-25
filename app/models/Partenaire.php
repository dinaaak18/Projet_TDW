<?php

namespace app\models;

use PDO;

class Partenaire {

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getPartByUsername($username) {
        $query = "SELECT * FROM Partenaire WHERE username = :username";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getPartners($limit, $offset) {
        $query = "SELECT nom, wilaya, categorie, remiseP, remiseJ, remiseC FROM Partenaire LIMIT :limit OFFSET :offset";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTotalPartners() {
        $query = "SELECT COUNT(*) FROM Partenaire";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchColumn();
    }
    public function getAllPartners() {
        $query = "SELECT nom, wilaya, categorie, remiseP, remiseJ, remiseC FROM Partenaire";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getFilteredPartners($category, $wilaya, $sortOrder)
    {
        $query = "SELECT * FROM Partenaire WHERE 1=1";
        $params = [];

        if (!empty($category)) {
            $query .= " AND categorie = :category";
            $params[':category'] = $category;
        }

        if (!empty($wilaya)) {
            $query .= " AND wilaya = :wilaya";
            $params[':wilaya'] = $wilaya;
        }

        $query .= " ORDER BY nom $sortOrder";

        $stmt = $this->db->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getCategories()
    {
        $stmt = $this->db->query("SELECT DISTINCT categorie FROM Partenaire");
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getWilayas()
    {
        $stmt = $this->db->query("SELECT DISTINCT wilaya FROM Partenaire");
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }


    public function getLimitedPartnersWithPhotos($limit = 3) {
        $query = "SELECT nom, logo FROM Partenaire LIMIT :limit";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getLimitedPartnersWithPhootos($limit = 8) {
        $query = "SELECT nom, photo FROM Partenaire LIMIT :limit";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPartnerDetails($id)
{
    $query = "SELECT nom, description FROM Partenaire WHERE id = :id";
    $stmt = $this->db->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
public function getEveryPartner($limit = 50, $offset = 0)
{
    $query = "SELECT * FROM Partenaire LIMIT :limit OFFSET :offset";
    $stmt = $this->db->prepare($query);
    $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


    public function addPartner($data)
{
    $query = "INSERT INTO Partenaire (nom, categorie, wilaya, remiseP, remiseJ, remiseC, contact, adresse, photo, logo, description, username, password) 
              VALUES (:nom, :categorie, :wilaya, :remiseP, :remiseJ, :remiseC, :contact, :adresse, :photo, :logo, :description, :username, :password)";
    $stmt = $this->db->prepare($query);
    $stmt->execute($data);
    return $stmt->rowCount();
}


    public function deletePartner($id)
    {
        $query = "DELETE FROM Partenaire WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function updatePartner($id, $data)
    {
        $query = "UPDATE Partenaire SET 
                  nom = :nom, categorie = :categorie, wilaya = :wilaya, remiseP = :remiseP, remiseJ = :remiseJ, 
                  remiseC = :remiseC, contact = :contact, adresse = :adresse, photo = :photo, logo = :logo, description = :description
                  WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $data['id'] = $id;
        $stmt->execute($data);
        return $stmt->rowCount();
    }
    public function getPartnerById($id)
{
    $query = "SELECT * FROM Partenaire WHERE id = :id";
    $stmt = $this->db->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

}
