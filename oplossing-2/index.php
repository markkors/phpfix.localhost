<?php
// autoloader functionaliteit inladen
// en registeren
use controllers\UserController;

require_once 'config/autoloader.php';
require_once 'controllers/UserController.php';

$controller = new UserController();
$controller->handleRequest();

