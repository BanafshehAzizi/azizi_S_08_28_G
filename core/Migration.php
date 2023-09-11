<?php


namespace Core;
require_once '../config/database.php';

abstract class Migration
{
    private $database;
    protected $connection;

    public function __construct()
    {
        $this->database = Database::getInstance(DB_HOST, DB_NAME, DB_USER, DB_PASS);
        $this->connection = $this->database->getConnection();
    }
}