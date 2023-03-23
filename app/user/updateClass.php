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

    public function update(string $type, string $value, string $table, string $name)
    {

        if ($type == 'name') {
            if ($table == 'LoggedWithTGE') {
                $table = 'usuariostge';
                $stmt = $this->conn->prepare("UPDATE " . $table . " SET usuario = :name WHERE usuario = :user");
                $stmt->bindParam(":name", $value);
                $stmt->bindParam(":user", $name);
                $log = $stmt->execute();
                return $log;
            }
        } else if ($type == 'descriptionChange') {
            if ($table == 'LoggedWithTGE') {
                $table = 'usuariostge';
                $stmt = $this->conn->prepare("UPDATE " . $table . " SET descricao = :value WHERE usuario = :user");
                $stmt->bindParam(":value", $value);
                $stmt->bindParam(":user", $name);
                $log = $stmt->execute();
                return $log;
            }
        }
    }
}