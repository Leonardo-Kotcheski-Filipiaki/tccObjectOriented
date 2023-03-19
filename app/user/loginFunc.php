<?php

namespace App\user;

use App\db\pdoConnection;
use \PDO;

class loginFunc{


    private $conn;

    public function __construct(){
        $db = new pdoConnection();
        $this->conn = $db->getConnection();
        
    }

    public function login (string $user, string $pass) {
        $this->user = $user;
        $this->pass = md5($pass);

        if(filter_var($this->user, FILTER_VALIDATE_EMAIL)){
        $stmt = $this->conn->prepare("SELECT usuario, imgPerf FROM usuariostge WHERE email=:user AND senha=:pass");
        $stmt->bindParam(":user", $this->user);
        $stmt->bindParam(":pass", $this->pass);
        $stmt->execute();
        $log = $stmt->fetch(PDO::FETCH_ASSOC);
        return $log;

        }else{
        $stmt = $this->conn->prepare("SELECT usuario, imgPerf FROM usuariostge WHERE usuario=:user AND senha=:pass");
        $stmt->bindParam(":user", $this->user);
        $stmt->bindParam(":pass", $this->pass);
        $stmt->execute();
        $log = $stmt->fetch(PDO::FETCH_ASSOC);
        return $log;
        }


    }



}