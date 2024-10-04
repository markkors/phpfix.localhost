<?php

namespace config;

// use PDO
use PDO;

class dbcontext
{
    private $conn;
    private $host = "localhost";
    private $username = "mijn_database_user";
    private $password = "mijn_database_user";
    private $dbname = "mijn_database";

    public function __construct()
    {
        // use PDO
        try {
            $this->conn = new PDO("mysql:host=localhost;dbname=mijn_database", "mijn_database_user", "mijn_database_user");
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Fout: " . $e->getMessage());
        }
    }

    public function getConnection() : PDO {
        return $this->conn;
    }

}