<?php

// Get Vendor autoload
require_once '../vendor/autoload.php';
require_once '../app/config.php';

use Weasley\Controllers\DefaultController;

$defaultController = new DefaultController();

if (empty($_GET)){
	echo $defaultController->indexAction();
} elseif ($_GET['login']== "admin"){
    echo $defaultController->loginAction();
} elseif ($_GET['user']== "admin"){
    echo $defaultController->adminAction();
} elseif ($_GET['admin']== "contact"){
    echo $defaultController->adminContactAction();
} elseif ($_GET['section'] == "concept"){
	echo $defaultController->conceptAction();
} elseif ($_GET['section'] == "produits"){
    echo $defaultController->produitsAction();
} elseif ($_GET['section'] == "contact"){
	echo $defaultController->contactAction();
}

