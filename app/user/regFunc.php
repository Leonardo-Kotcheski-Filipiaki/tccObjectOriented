<?php

namespace App\user;

use App\db\pdoConnection;
use \PDO;


class regFunc{

    private $conn;

    private $cript;

    public function __construct(){
        $db = new pdoConnection();
        $this->conn = $db->getConnection();
        $this->cript = $db;
    }
    
    public function register (string $user, string $mail, string $pass) {
        $this->user = $user;
        $this->mail = $mail;
        $this->pass = $pass;
        $password = md5($this->pass);
        $resultUser = $this->existUser($this->user);
        $resultMail = $this->existsMail($this->mail);
        if($resultUser && $resultMail){
            header("Location: registroPage.php?msg=mailuserExists");
        }else if($resultMail){
            header("Location: registroPage.php?msg=mailExists");
        }else if($resultUser){
            header("Location: registroPage.php?msg=userExists");
        }else{
            $stmt = $this->conn->prepare('INSERT INTO usuariostge (usuario, email, senha, imgPerf) VALUES(:user, :mail, :pass, "icon.png")');
            $stmt->bindParam(':user', $user);
            $stmt->bindParam(':mail', $mail);
            $stmt->bindParam(':pass', $password);
            $log = $stmt->execute();
            return $log;
        }

    }
    
    private function existUser (string $user){
        $this->user = $user;
        $stmt = $this->conn->prepare("SELECT usuario FROM usuariostge WHERE usuario=:user");
        $stmt->bindParam(':user', $this->user);
        $stmt->execute();
        $log = $stmt->fetch(PDO::FETCH_ASSOC);
        return $log;
    }

    public function existsMail (string $mail){
        $this->mail = $mail;
        $stmt = $this->conn->prepare("SELECT email FROM usuariostge WHERE email=:mail");
        $stmt->bindParam(':mail', $this->mail);
        $stmt->execute();
        $log = $stmt->fetch(PDO::FETCH_ASSOC);
        return $log;
    }
    

    
















}