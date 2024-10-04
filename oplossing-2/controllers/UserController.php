<?php

namespace controllers;

use config\dbcontext;
use models\User;

class UserController
{
    /** @var User $userModel */
    private $userModel;

    public function __construct() {
        $database = new dbcontext();
        $db = $database->getConnection();
        $this->userModel = new User($db);
    }

    public function handleRequest() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $action = $_POST['action'];

            $id=null;
            $username=null;
            $password=null;

            if(isset($_POST['id'])) {
                $id = htmlspecialchars($_POST['id']);
            }
            if(isset($_POST['username'])) {
                $username = htmlspecialchars($_POST['username']);
            }
            if(isset($_POST['password'])) {
                $password = htmlspecialchars($_POST['password']);
            }

            switch ($action) {
                case 'toevoegen':
                    $this->userModel->addUser($username, $password);
                    break;
                case 'verwijderen':
                    $this->userModel->deleteUser($id);
                    break;
                case 'wijzigen':
                    $this->userModel->editUser($id, $username, $password);
                    break;
            }
            header("Location: " . $_SERVER['PHP_SELF']);
            exit;
        }

        // always show the users
        $this->showUsers();

    }

    private function showUsers() {
        $usertable= $this->getUsersTable();
        require 'views/user_managment.php';
    }

    private function getUsersTable() :string {
        // voor type hinting in PHPStorm
        /** @var User $users */

        $users = $this->userModel->getAllUsers();
        $result = null;
        $result .= "<table>";
        $result.= "<tr><th>ID</th><th>Gebruikersnaam</th></tr>";
        foreach ($users as $u) {
            $result .= "<tr><td>" . $u['id'] . "</td><td>" . $u['username'] . "</td></tr>";
        }
        $result .= "</table>";
        return $result;
    }


}