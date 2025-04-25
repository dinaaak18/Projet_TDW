<?php
namespace app\models; 
use PDO;
class Donstat {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getStat() {
        $stmt = $this->db->prepare("SELECT stat FROM Donstat WHERE id = 1");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $result['stat'] : null;
    }

    public function incrementStat() {
        $stmt = $this->db->prepare("UPDATE Donstat SET stat = stat + 1 WHERE id = 1");
        $stmt->execute();
    }
}

?>
