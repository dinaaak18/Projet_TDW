<?php

namespace app\models;

use PDO;

class Membre {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getUserByUsername($username) {
        $query = "SELECT * FROM Membre WHERE username = :username";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getUserById($id) {
        $query = "SELECT * FROM Membre WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getMemberById($id) {
        $query = "SELECT nom, prenom, cartetype FROM Membre WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function createUser($username, $hashedPassword, $nom, $prenom) {
        $query = $this->db->prepare(
            'INSERT INTO Membre (username, password, nom, prenom) VALUES (:username, :password, :nom, :prenom)'
        );
        return $query->execute([
            'username' => $username,
            'password' => $hashedPassword,
            'nom' => $nom,
            'prenom' => $prenom,
        ]);
    }
    public function updateUser($id, $nom, $prenom, $adresse, $profession, $password) {
        $stmt = $this->db->prepare("UPDATE Membre SET nom = :nom, prenom = :prenom, adresse = :adresse, profession = :profession, password = :password WHERE id = :id");
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':adresse', $adresse);
        $stmt->bindParam(':profession', $profession);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function getMembresAApprouver()
    {
        $query = "SELECT * FROM Membre WHERE approuv IS NULL AND cartedemande IS NOT NULL";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function approuverMembre($id)
    {
        $dateInscription = date('Y-m-d'); 
        $query = "UPDATE Membre SET approuv = 1, dateinscription = :dateinscription, cartetype = cartedemande WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':dateinscription', $dateInscription);
        $stmt->execute();
    }
    public function updateCarteAdhesion($id, $cartePath)
    {
        $query = "UPDATE Membre SET carte = :carte WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':carte', $cartePath);
        $stmt->execute();
    }
}

