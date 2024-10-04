<?php

class user
{
    public $username;
    public $password;
    public $id;

    public function __construct($username, $password, $id)
    {
        $this->username = $username;
        $this->password = $password;
        $this->id = $id;
    }
}