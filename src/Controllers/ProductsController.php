<?php
/**
 * Created by PhpStorm.
 * User: valerianearon
 * Date: 28/11/2017
 * Time: 14:57
 */

namespace Weasley\Controllers;
use PDO;
use Weasley\Model\Entity\Product;
use Weasley\Model\Repository\ProductManager;
/******************* Ici le add update et delete des products ******************/

class ProductsController extends Controller
{
    public function updateProductAction()
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


    public function createProductAction()
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
            return $this->twig->render('admin/admin_successAddProduit.html.twig');

        } return $this->twig->render('admin/admin_new_product.html.twig');
    }

    public function deleteProductAction()
    {
        $id= $_GET['id'];
        $productManager = new ProductManager();
        $productManager->deleteProducts($id);
        $products = $productManager->getAllProducts();
        return $this->twig->render('admin/admin_products.html.twig', array(
        'products' => $products
        ));
    }

}



