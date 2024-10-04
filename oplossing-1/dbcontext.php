<?php
include "user.php";

class dbcontext
{

    private $conn;

    public function __construct()
    {
        // Verbinding maken met de database
        $this->conn = mysqli_connect("localhost", "mijn_database_user", "mijn_database_user", "mijn_database");

        if (!$this->conn) {
            die("Fout: Kan geen verbinding maken met de database. " . mysqli_connect_error());
        }
    }


    public function getUsers() : array {
        $sql = "SELECT * FROM users";
        $result = mysqli_query($this->conn, $sql);
        $users = [];
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                //$users[] = $row;
                $u = new user($row['username'], $row['password'], $row['id']);
                $users[] = $u;

            }
        }
        return $users;
    }
}