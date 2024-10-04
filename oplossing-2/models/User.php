<?php

namespace models;

class User
{
    private $conn;
    private $table = "users";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function addUser($username, $password) : bool {
        $result = false;
        try {
            // PDO
            $stmt = $this->conn->prepare("INSERT INTO " . $this->table . " (username, password) VALUES (:username, :password)");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
            $result = $stmt->execute();
        } catch (PDOException $e) {
            die("Fout: " . $e->getMessage());
        }
        return $result;

    }

    public function deleteUser($id) : bool
    {
        $result = false;
        try {
            $stmt = $this->conn->prepare("DELETE FROM " . $this->table . " WHERE id=:id");
            $stmt->bindParam(':id', $id);
            $result = $stmt->execute();
        } catch (PDOException $e) {
            die("Fout: " . $e->getMessage());
        }
        return $result;
    }

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


    public function getAllUsers() : array {
        $result = [];
        try {
            $stmt = $this->conn->prepare("SELECT * FROM " . $this->table);
            $stmt->execute();
            $result = $stmt->fetchAll();
        } catch (PDOException $e) {
            die("Fout: " . $e->getMessage());
        }
        return $result;
    }
}