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

session_start();

$getKey = array_keys($_GET);

if (empty($_GET)) {
    echo $defaultController->indexAction();
    /*Code sale - à ne pas refaire*/
} else if ($getKey[0] != 'section'){
    echo $defaultController->errorAction();
} elseif ($_GET['section'] == "concept") {
    echo $defaultController->conceptAction();

} elseif ($_GET['section'] == "produits") {
    echo $defaultController->produitsAction();

} elseif ($_GET['section'] == "contact"){
    echo $defaultController->contactAction();

} elseif ($_GET['section'] == "contact"){
    echo $defaultController->contacUstAction();

} elseif ($_GET['section'] == "mentions") {
    echo $defaultController->mentionsAction();

} elseif ($_GET['section'] == "login") {
    echo $adminController->loginAction();

} elseif ($_GET['section'] == "logout") {
    echo $adminController->logoutAction();
}

elseif ($_GET['section'] == "admin") {
    if (isset($_SESSION['login'])){
        if (!isset ($_GET['page'])) {
            echo $adminController->adminAction();
            /*Code sale - à ne pas refaire*/
        } else if ($getKey[1] != 'page'){
            echo $adminController->adminErrorAction();
        } elseif ($_GET['page'] == "admin_contact") {
            echo $contactController->contactUpdateAction();

        } elseif ($_GET['page'] == "admin_products") {
            echo $adminController->adminProductAction();

        } elseif ($_GET['page'] == "admin_update_products") {
            echo $productsController->updateProductAction();

        } elseif ($_GET['page']== "admin_new_product") {
            echo $productsController->createProductAction();

        } elseif ($_GET['page'] == "admin_delete_products") {
            echo $productsController->deleteProductAction();

        } else {
            echo $adminController->adminErrorAction();
        }
    } else {
        echo $adminController->loginAction();
    }
}
else {
    echo $defaultController->errorAction();
}

