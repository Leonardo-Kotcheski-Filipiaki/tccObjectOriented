<?php


namespace App\user;

use App\db\pdoConnection;
use \PDO;


class updateClass
{

    private $conn;

    public function __construct()
    {
        $db = new pdoConnection();
        $this->conn = $db->getConnection();

    }

    public function update(string $type, string $value, string $table, string $oldName)
    {

        if ($type == 'name' && $table == 'LoggedWithTGE') {
            $table = 'usuariostge';
            $stmt = $this->conn->prepare("UPDATE " . $table . " SET usuario = :name WHERE usuario = :oldName");
            $stmt->bindParam(":name", $value);
            $stmt->bindParam(":oldName", $oldName);
            $log = $stmt->execute();
            return $log;
        }
    }


    private function updateSession(string $value, string $table)
    {

        if ($table == 'LoggedWithTGE') {
            $table = 'usuariostge';
            $stmt = $this->conn->prepare("SELECT usuario FROM " . $table . " WHERE usuario = :name");
            $stmt->bindParam(":name", $value);
            $stmt->execute();
            $log = $stmt->fetch(PDO::FETCH_ASSOC);
            return $log;

        }

    }


}