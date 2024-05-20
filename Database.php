<?php

namespace ParkingSystem;

use PDO;
use PDOException;

class Database
{
    private $serverName = 'HOME-PC';
    private $database = 'ParkingSystem';
    private $pdo;
    private $error;

    public function __construct()
    {
        $dsn = "sqlsrv:server=$this->serverName;Database=$this->database";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try {
            $this->pdo = new PDO($dsn, null, null, $options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public function getConnection()
    {
        return $this->pdo;
    }
}
