<?php

namespace Database\Migrations;

use Core\Migration;

class CreateShoppingItemsTable extends Migration
{
    public function up()
    {
        $SQL = "CREATE TABLE shopping_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    status_id INT DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (status_id) REFERENCES shopping_items_status(id)
) ENGINE=INNODB;";
        $this->connection->exec($SQL);
    }

    public function down()
    {
        $SQL = "DROP TABLE shopping_items;";
        $this->connection->exec($SQL);
    }

}