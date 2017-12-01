<?php
/**
 * Created by PhpStorm.
 * User: valerianearon
 * Date: 28/11/2017
 * Time: 14:52
 */

namespace Weasley\Controllers;

use Weasley\Model\Repository\UserManager;
use Weasley\Model\Repository\ContactManager;
use Weasley\Model\Repository\ProductManager;

class AdminController extends Controller
    // /**********************************************************************************
    //  ********************Ici on met les simples vues côté admin! *********************/

{
    /**
     * Render login
     */
    public function loginAction()
    {
        return $this->twig->render('admin/login.html.twig');
    }

    /**
     * Render admin
     */
    public function adminAction()
    {
        $contact = new ContactManager();
        $coordonnees = $contact->getContact();
        return $this->twig->render('admin/admin.html.twig', array(
            "coordonnees" => $coordonnees));
    }

//    /**
//     * Render admin contact update form
//     */
//    public function adminContactAction()
//    {
//        $contactManager = new ContactManager();
//        $coordonnees = $contactManager->getContact();
//
//        if ($_SERVER['REQUEST_METHOD'] == "POST") {
//            $errors = [];
//            foreach ($_POST as $key => $value) {
//                if (empty($_POST[$key])) {
//                    $errors[$key] = "Veuillez renseigner le champ " . $key;
//                }
//            }
//
//            if (!empty($errors)) {
//                return $this->twig->render('admin/admin_contact.html.twig', array(
//                    'errors' => $errors
//                ));
//            } else {
//                $id = $_GET['id'];
//                $adresse = $_POST ['adresse'];
//                $telephone = $_POST ['telephone'];
//                $ouverture = $_POST ['ouverture'];
//                $commentaire = $_POST ['commentaire'];
//
//                $contactManager->updateContact($id, $adresse, $telephone, $ouverture, $commentaire);
//
//            }
//            return $this->twig->render('admin/admin_success.html.twig');
//        }
//        return $this->twig->render('admin/admin_contact.html.twig', array(
//            "coordonnees" => $coordonnees
//        ));
//    }

    public function adminProductAction()
    {
        $productManager = new ProductManager();
        $products = $productManager->getAllProducts();
        return $this->twig->render('admin/admin_products.html.twig', array(
            "products" => $products));
    }

    public function adminUpdateProductAction()
    {
        $productManager = new ProductManager();
        $products = $productManager->getAllProducts();

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $errors = [];
            foreach ($_POST as $key => $value) {
                if (empty($_POST[$key])) {
                    $errors[$key] = "Veuillez renseigner le champ " . $key;
                }
            }

            if (!empty($errors)) {
                return $this->twig->render('admin/admin_update_products.html.twig', array(
                    'errors' => $errors
                ));
            } else {
                $id = $_GET['id'];
                $nomProduit = $_POST ['nom'];
                $descriptionProduit = $_POST ['description'];
                $imageUrl = $_POST ['image'];
                $catProduit = $_POST ['categorie'];

                $productManager->updateProducts($id, $nomProduit, $descriptionProduit, $imageUrl, $catProduit);

            }
            return $this->twig->render('admin/admin_success.html.twig');
        }
        return $this->twig->render('admin/admin_update_products.html.twig', array(
            'products' => $products
        ));
    }

    public function adminCreateProductAction()
    {
        $productManager = new ProductManager();

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $errors = [];
            foreach ($_POST as $key => $value) {
                if (empty($_POST[$key])) {
                    $errors[$key] = "Veuillez renseigner le champ " . $key;
                }
            }
            if (!empty($errors)) {
                return $this->twig->render('admin/admin_new_product.html.twig', array(
                    'errors' => $errors
                ));
            } else {
                // Récupération des infos du formulaire

                $nomProduit = $_POST ['nomProduit'];
                $descriptionProduit = $_POST ['descriptionProduit'];
//                $imageUrl = $_POST ['imageUrl'];
                $catProduit = $_POST ['catProduit'];

                // Requete BDD
                $productManager->createProduct($nomProduit, $descriptionProduit, $catProduit);
            }
            // Redirection vers la page de succès
            return $this->twig->render('admin/admin_success.html.twig');

        } return $this->twig->render('admin/admin_new_product.html.twig');
    }

}