<?php

namespace app\models;

use app\models\Database;

class TypeAide
{
    public static function getAllTypes()
    {
        $database = Database::getInstance()->getConnection();

        $query = "SELECT type, description FROM TypeAide";
        $stmt = $database->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
