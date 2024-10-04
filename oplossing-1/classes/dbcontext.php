<?php
include "user.php";

class dbcontext
{

    private $conn;

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

    /**
     * Get all users from the database
     * @return array
     */
    private function getUsers() : array {
        // use PDO
        $sql = "SELECT * FROM users";
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $users = [];
            while ($row = $stmt->fetch()) {
                $u = new user($row['username'], $row['password'], $row['id']);
                $users[] = $u;
            }
        } catch (PDOException $e) {
            die("Fout: " . $e->getMessage());
        }
        return $users;
    }

    public function getUsersTable() :string {
        // voor type hinting in PHPStorm
        /** @var user $u */
        $users = $this->getUsers();
        $result = null;
        $result .= "<table>";
        $result.= "<tr><th>ID</th><th>Gebruikersnaam</th></tr>";
        foreach ($users as $u) {
            $result .= "<tr><td>" . $u->id . "</td><td>" . $u->username . "</td></tr>";
        }
        $result .= "</table>";
        return $result;
    }

    /**
     * Add a user to the database
     * @param $username
     * @param $password
     * @return bool
     */
    public function addUser($username, $password) : bool {
        $result = false;
        // use PDO
        $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
            $result = $stmt->execute();
        } catch (PDOException $e) {
            die("Fout: " . $e->getMessage());
        }
        return $result;
    }

    /**
     * Delete a user to the database
     * @param $id
     * @return bool
     */
    public function deleteUser($id) : bool {
        $result = false;
        // use PDO
        $sql = "DELETE FROM users WHERE id=:id";
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $result = $stmt->execute();
        } catch (PDOException $e) {
            die("Fout: " . $e->getMessage());
        }
        return $result;
    }


    /** @noinspection DuplicatedCode */
    public function editUser($id, $username, $password) : bool {
        $result = false;
        // use PDO
        $sql = "UPDATE users SET username=:username, password=:password WHERE id=:id";
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
            $result = $stmt->execute();
        } catch (PDOException $e) {
            die("Fout: " . $e->getMessage());
        }
        return $result;
    }

}