<?php
// autoloader functionaliteit inladen
// en registeren
require_once 'config/autoloader.php';
require_once 'controllers/UserController.php';

$controller = new \controllers\UserController();
$controller->handleRequest();

