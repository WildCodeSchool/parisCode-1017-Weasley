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
    echo $defaultController->produitsAction();

} elseif ($_GET['section'] == "contact"){
    echo $contactController->contactAction();

} elseif ($_GET['section'] == "mentions"){
    echo $defaultController->mentionsAction();

} elseif ($_GET['section']== "login"){
    echo $adminController->loginAction();

} elseif ($_GET['section']== "admin") {
    if (!isset ($_GET['page'])) {

        echo $adminController->adminAction();

    } elseif ($_GET['page']== "admin_contact") {
        echo $contactController->contactUpdateAction();

    } elseif ($_GET['page']== "admin_products") {
        echo $adminController->adminProductAction();

    } elseif ($_GET['page']== "admin_update_products") {
        echo $adminController->adminUpdateProductAction();
    } elseif ($_GET['page']== "admin_delete_products") {
        echo $productsController->deleteProductAction();

    }
}

//$adminController !!!
//ProduitManager ContactManager !