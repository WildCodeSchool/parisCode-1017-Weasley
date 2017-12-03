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
//Définition de la constante DIR_PATH qui renvoie au chemin du dossier des uploads
define("DIR_PATH", 'public/uploads/');


class ProductsController extends Controller
{
    public function updateProductAction()
    {   $idProduit= $_GET['id'];
        $productManager = new ProductManager();
        $product = $productManager->getOneProduct($idProduit);

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
                $idProduit = $_GET['id'];
                $nomProduit = $_POST ['nom'];
                $descriptionProduit = $_POST ['description'];
                /*$imageUrl = $_POST ['image'];*/
                $catProduit = $_POST ['categorie'];

                $productManager->updateProducts($idProduit, $nomProduit, $descriptionProduit, /*$imageUrl,*/ $catProduit);

            }
            return $this->twig->render('admin/admin_success_update_product.html.twig');
        }
        return $this->twig->render('admin/admin_update_products.html.twig', array(
            'product' => $product
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
                $imageUrl = $_POST ['imageUrl'];
                $catProduit = $_POST ['categorie'];

//                if upload file
                if (!empty($_FILES['files']['name'][0])) {

                    $files = $_FILES ['files'];
                    $uploaded = array();
                    $failed = array();

//                   Tableau des extensions autorisées
                    $allowed = array('png', 'jpg', 'gif');

                    foreach ($files ['name'] as $position => $file_name) {

                        $file_tmp = $files['tmp_name'] [$position];
                        $file_size = $files ['size'] [$position];
                        $file_error = $files ['error'] [$position];

//                      Récupération de l'extension des $file_name
                        $file_ext = explode('.', $file_name);
                        $file_ext = strtolower(end($file_ext));

//                      Si l'extension du fichier figure dans le tableau des extensions autorisées
                        if (in_array($file_ext, $allowed)) {
                            //Si le fichier ne contient pas d'erreur
                            if ($file_error === 0) {
                                //Si le poids du fichier est inférieur à 1 MO
                                if ($file_size <= 2000000) {
                                    //On crée un nouveau nom de fichier avec le préfixe image, puis un uniqid, suivi de l'extension de fichier
                                    $file_name_new = 'weasley' . uniqid('') . '_' . $file_ext;
                                    $file_destination = DIR_PATH . $file_name_new;

                                    if (move_uploaded_file($file_tmp, $file_destination)) {
                                        $uploaded[$position] = $file_destination;
                                    } else {
                                        $failed [$position] = "[{$file_name}] n'a pas pu être uploadé.\n";
                                    }
                                } else {
                                    $failed [$position] = "[{$file_size}] est trop grand. Le fichier uploadé doit être inférieur à 1 MO.\n";
                                }
                            } else {
                                $failed [$position] = "[{$file_name}] comporte une erreur'{$file_error}'\n";
                            }
                        } else {
                            $failed [$position] = "[{$file_name}] l'extension '{$file_ext}' n'est pas prise en charge\n";
                        }
                    }
                }


                // Requete BDD
                $productManager->createProduct($nomProduit, $descriptionProduit, $catProduit, $imageUrl);
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



