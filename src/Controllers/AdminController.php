<?php
/**
 * Created by PhpStorm.
 * User: valerianearon
 * Date: 28/11/2017
 * Time: 14:52
 */

namespace Weasley\Controllers;

use Weasley\Model\Entity\Product;
use Weasley\Model\Repository\UserManager;
use Weasley\Model\Repository\ContactManager;
use Weasley\Model\Repository\ProductManager;


/**********************************************************************************
 ********************Ici on met les simples vues côté admin! *********************/

class AdminController extends Controller

    // /**********************************************************************************
    //  ********************Ici on met les simples vues côté admin! *********************/

{
    /**
     * Render login
     */
    public function loginAction()
    {
        $userManager = new UserManager();

        if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {
            $errors = [];
            foreach ($_POST as $key => $value) {
                if (empty($_POST[$key])) {
                    $errors[$key] = "Veuillez remplir ce champ" . $key;
                }
            }
            if (!empty($errors)) {
                return $this->twig->render('admin/login.html.twig', array(
                    'errors' => $errors
                ));
            } else {
                $login = $_POST['login'];
                $password = $_POST['password'];
                $user = $userManager->getPassword($login);

                if (empty($user)) {
                    return $this->twig->render('admin/login.html.twig');
                }

                if (password_verify($password, $user->getPassword())) {
                    $_SESSION['login'] = $user->getLogin();
                    header('Location: index.php?section=admin');
                } else {
                    return $this->twig->render('admin/login.html.twig');
                }
            }
        }else {
            return $this->twig->render('admin/login.html.twig');
        }
    }

    public function logoutAction(){
        session_destroy();
        return $this->twig->render('admin/admin_success_logout.html.twig');
    }


    /**
     * Render admin page with contact datas from database
     */
    public function adminAction()
    {
        $contact = new ContactManager();
        $coordonnees = $contact->getContact();
        return $this->twig->render('admin/admin.html.twig', array(
            "coordonnees" => $coordonnees));
    }

    /**
     * Render product page with all products
     */
    public function adminProductAction()
    {
        $productManager = new ProductManager();
        $products = $productManager->getAllProducts();
        return $this->twig->render('admin/admin_products.html.twig', array(
            "products" => $products));
    }

    public function adminErrorAction()
    {
        return $this->twig->render('admin/admin_error.html.twig');
    }
}