<?php

namespace app\models;

use PDO;

class Admin {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAdminByUsername($username) {
        $query = "SELECT * FROM Admin WHERE username = :username";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}