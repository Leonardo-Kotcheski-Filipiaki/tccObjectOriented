<?php

namespace App\db;

use \PDO;
use \PDOException;

class pdoConnection {

    /**
     * Host de conexão com o bd
     * @var string
     */
    const HOST = 'localhost';

    /**
     * Porta de conexão com o bd
     * @var string
     */
    const PORT = '33';

    /**
     * Nome do Banco de dados
     * @var string
     */
    const NAME = 'tge';

    /**
     * Usuario do banco de dados
     * @var string
     */
    const USER = 'root';

     /**
     * Senha do banco de dados
     * @var string
     */
    const PASS = '';

    /**
     *  Define uma tabela para ser alterada 
     *  @var string
     */
    private $table;

    /**
     * Instãncia de conexão do banco de dados (PDO nesse caso)
     * @var PDO
     */
    private $conn;

    /**
     * Se define a tabela e instância a conexão
     * @param string $table
    */
    public function __construct($table = null){
        $this->table = $table;
        $this->setConnection();
    }

    /**
     * Metodo responsavel por criar uma conexão com o banco de dados
     */
    private function setConnection(){
        try{
            $this->conn = new PDO('mysql:host='.self::HOST.';port='.self::PORT.'dbname='.self::NAME,self::USER,self::PASS);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            
        }catch(PDOException $e){
            die('ERROR'.$e->getMessage());
        }


    }

}