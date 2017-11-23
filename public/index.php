<?php

// Get Vendor autoload
require_once '../vendor/autoload.php';
require_once '../app/config.php';

use Weasley\Controllers\DefaultController;

$defaultController = new DefaultController();

if (empty($_GET)){
	echo $defaultController->indexAction();

} elseif ($_GET['section'] == "concept"){
	echo $defaultController->conceptAction();

} elseif ($_GET['section'] == "produits"){
    echo $defaultController->produitsAction();

} elseif ($_GET['section'] == "contact"){
	echo $defaultController->contactAction();

} elseif ($_GET['section']== "login"){
    echo $defaultController->loginAction();

} elseif ($_GET['section']== "admin"){
    echo $defaultController->adminAction();

} elseif ($_GET['section']== "admin_contact") {
    echo $defaultController->adminContactAction();
}
