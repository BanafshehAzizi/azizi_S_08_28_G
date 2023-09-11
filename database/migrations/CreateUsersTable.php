<?php

namespace Database\Migrations;

use Core\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        $SQL = "CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=INNODB;";
        $this->connection->exec($SQL);
    }

    public function down()
    {
        $SQL = "DROP TABLE users;";
        $this->connection->exec($SQL);
    }
}