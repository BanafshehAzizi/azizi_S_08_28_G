<?php

namespace App\Models;

use Cassandra\Exception\ValidationException;
use Core\Database;
use PDO;

//require_once APP_ROOT.'core/Database.php';


abstract class Model
{
    private $database;
    protected $connection;
    protected $table = null;

    public function __construct()
    {
        $this->database = Database::getInstance(DB_HOST, DB_NAME, DB_USER, DB_PASS);
        $this->connection = $this->database->getConnection();
    }

    public function insert($input)
    {
        $columns = implode(',', array_keys($input));
        $values = "'" . implode("','", array_values($input)) . "'";
        $this->connection->query('insert into ' . $this->table . '(' . $columns . ') values(' . $values . ')');
    }

    public function update($input)
    {
/*        if (empty($this->show(['id' => $input['id']]))) {
            throw new ValidationException('The item id is invalid', 422);
        }*/
            $set = implode(' and ', array_map(function ($key, $value) {
                return $key . '="' . $value . '"';
            }, array_keys($input['input']), $input['input']));
        $this->connection->query('update ' . $this->table . ' set ' . $set . ' where id="' . $input['id'] . '"');
    }

    public function delete($input)
    {
        if (empty($input['id'])) {
            return null;
        }
        $this->connection->query('DELETE from ' . $this->table . ' where id = "' . $input['id'] . '"');
    }

    public function list()
    {
        $query = 'SELECT * FROM ' . $this->table;
        $statement = $this->connection->query($query);
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    public function show($input)
    {
        $query = 'SELECT * FROM ' . $this->table . ' where id="' . $input['id'] . '"';
        $statement = $this->connection->query($query);
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

}