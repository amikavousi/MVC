<?php

namespace App\Models;

use PDO;
use PDOStatement;

abstract class Model
{
    protected $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=127.0.0.1:3306;dbname=insta', 'root', '');
        return $this->db;
    }

    public function all()
    {
        return $this->db->query("SELECT * FROM $this->table")->fetchAll(PDO::FETCH_OBJ);
    }

    public function find($id)
    {
        return $this->db->query("SELECT * FROM $this->table WHERE $this->primaryKey = $id")->fetchAll(PDO::FETCH_OBJ);
    }

}
