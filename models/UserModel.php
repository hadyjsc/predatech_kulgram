<?php
require 'config/mysql.php';

class UserModel extends Mysql
{
    private $db;
    private $table;

    function __construct() {
        $database = Mysql::connection();
        $this->db = $database;
        $this->table = "users";
    }
    
    public function getAll()
    {
        $results = $this->db
                    ->table($this->table)
                    ->get();
        return $results;
    }

    public function insert($data)
    {
        $insert = $this->db
                ->table($this->table)
                ->insert($data);
        return $insert;
    }
}
