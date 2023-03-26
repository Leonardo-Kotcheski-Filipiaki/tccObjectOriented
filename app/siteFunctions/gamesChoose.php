<?php

namespace App\siteFunctions;

use App\db\pdoConnection;
use \PDO;

class gamesChoose {

    private $conn;

    public function __construct(){
        $db = new pdoConnection();
        $this->conn = $db->getConnection(); 
    }

    public function findGames(){
        $stmt = $this->conn->prepare("SELECT * FROM games;");
        $stmt->execute();
        $log = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $log;
    }
    



}
