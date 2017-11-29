<?php

// Get Vendor autoload
require_once '../vendor/autoload.php';
require_once '../app/config.php';

// Rappel des controllers

use Weasley\Controllers\DefaultController;
use Weasley\Controllers\AdminController;
use Weasley\Controllers\ContactController;
use Weasley\Controllers\ProductsController;

$defaultController = new DefaultController();
$adminController = new AdminController();
$contactController = new ContactController();
$productsController = new ProductsController();


if (empty($_GET)){
	echo $defaultController->indexAction();

} elseif ($_GET['section'] == "concept"){
	echo $defaultController->conceptAction();

} elseif ($_GET['section'] == "produits"){
    echo $productsController->produitsAction();

} elseif ($_GET['section'] == "contact"){
    echo $contactController->contactAction();

} elseif ($_GET['section'] == "mentions"){
    echo $defaultController->mentionsAction();

} elseif ($_GET['section']== "login"){
    echo $adminController->loginAction();

} elseif ($_GET['section']== "admin"){
    echo $adminController->adminAction();

} elseif ($_GET['section']== "admin_contact") {
    echo $adminController->adminContactAction();
}

//$adminController !!!
//ProduitManager ContactManager !