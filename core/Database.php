<?php

namespace Core;

use PDO;
use PDOException;

class Database
{
    private static $instance = null;
    protected $connection;

    public function __construct($host, $dbName, $username, $password) {
        try {
            $dsn = "mysql:host=$host;dbname=$dbName;charset=utf8mb4";
            $this->connection = new PDO($dsn, $username, $password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }

    public static function getInstance($host, $dbName, $username, $password) {
        if (!self::$instance) {
            self::$instance = new Database($host, $dbName, $username, $password);
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }

}