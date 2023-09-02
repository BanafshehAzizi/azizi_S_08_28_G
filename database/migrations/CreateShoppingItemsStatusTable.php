<?php

namespace Database\Migrations;
use Core\Migration;

class CreateShoppingItemsStatusTable extends Migration
{
    public function __construct()
    {
        parent::__construct();
    }

    public function up()
    {
        $SQL = "CREATE TABLE shopping_items_status (
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(255) NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )  ENGINE=INNODB;";
        $this->connection->exec($SQL);
    }

    public function down()
    {
        $SQL = "DROP TABLE shopping_items_status;";
        $this->connection->exec($SQL);
    }

}