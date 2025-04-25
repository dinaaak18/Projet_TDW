<?php
namespace app\models;
use PDO; 
class Benevstat {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getStat() {
        $stmt = $this->db->prepare("SELECT stat FROM Benevstat WHERE id = 1");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? (int)$result['stat'] : 0; 
    }

    public function incrementStat() {
        $stmt = $this->db->prepare("UPDATE Benevstat SET stat = stat + 1 WHERE id = 1");
        $stmt->execute();
    }
}

?>
