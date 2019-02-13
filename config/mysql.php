<?php
require_once "vendor/autoload.php";

class Mysql  {
    public function connection()
    {
        $config = [
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => 'db_inventory',
            'username'  => 'root',
            'password'  => '',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ];
        
        try {
            $conn = new \Pecee\Pixie\Connection('mysql', $config);
            return $conn->getQueryBuilder();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}



?>