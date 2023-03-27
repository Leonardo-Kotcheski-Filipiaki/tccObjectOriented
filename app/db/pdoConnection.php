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
     * Chave para criptografia
     * 
    */
    private $key='CK5XiOmgnGq65EDWejXNFEJ9PoOTjoa2';

    /**
     * Se define a tabela e instância a conexão
     * @param string $table
    */
    public function __construct() {
        $dsn = "mysql:host=".self::HOST.";port=".self::PORT.";dbname=".self::NAME;
        try {
            $this->conn = new PDO($dsn, self::USER, self::PASS);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function getConnection() {
        return $this->conn;
    }

}