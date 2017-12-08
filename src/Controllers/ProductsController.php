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
use Weasley\Services\Uploads;
use Weasley\Services\UploadedFile;


class ProductsController extends Controller
{
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
            if (empty ($_FILES['imgUpload']['name'])) {
                $errors['image'] = "Veuillez ajouter une image";

            }

            if (!empty($errors)) {
                return $this->twig->render('admin/admin_new_product.html.twig', array(
                    'errors' => $errors
                ));
            } else {
                // Récupération des infos du formulaire
                $nomProduit = $_POST ['nomProduit'];
                $descriptionProduit = $_POST ['descriptionProduit'];
                $catProduit = $_POST ['categorie'];
                $image = $_FILES['imgUpload'];

                $uploadedFile = new UploadedFile($image['name'], $image['tmp_name'], $image['size']);

                // Upload du fichier via la méthode définie dans le service
                $upload = new Uploads();

                $result = $upload->upload($uploadedFile);
                if (!empty($result)) {
                    return $this->twig->render('admin/admin_new_product.html.twig', array(
                        'erreur_image' => $result
                    ));
                } else {
                    // Requete BDD
                    $productManager->createProduct($nomProduit, $descriptionProduit, $uploadedFile->getFileName(), $catProduit);
                }

                // Redirection vers la page de succès
                return $this->twig->render('admin/admin_successAddProduit.html.twig');

            }
        } else {
            return $this->twig->render('admin/admin_new_product.html.twig');
        }

    }

    public function updateProductAction()
    {
        $idProduit = $_GET['id'];
        $productManager = new ProductManager();
        $product = $productManager->getOneProduct();

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
            } // on modifie l'image aussi
            if (!empty($_FILES['imgUpload']['name'])) {
                $image = $_FILES['imgUpload'];
                $uploadedFile = new UploadedFile($image['name'], $image['tmp_name'], $image['size']);

                $upload = new Uploads();

                $result = $upload->upload($uploadedFile);
                if (!empty($result)) {

                    return $this->twig->render('admin/admin_update_products.html.twig', array(
                        'erreur_image' => $result
                    ));
                } else {
                    // effacer l'image du dossier uploads
                    $paf = $productManager->getOneProduct($idProduit);
                    $url = 'uploads/' . $paf['imageUrl'];
                    unlink($url);
                    $productManager->updateImgProducts($idProduit, $uploadedFile->getFileName());
                }
            } else {
                $idProduit = $_GET['id'];
                $nomProduit = $_POST ['nom'];
                $descriptionProduit = $_POST ['description'];
                $catProduit = $_POST ['categorie'];

                $productManager->updateProducts($idProduit, $nomProduit, $descriptionProduit, $catProduit);
            }
            return $this->twig->render('admin/admin_success_update_product.html.twig');
        } else {
            return $this->twig->render('admin/admin_update_products.html.twig', array(
                'product' => $product
            ));
        }
    }

    public function deleteProductAction()
    {
        $id = $_GET['id'];
        $productManager = new ProductManager();
        $paf = $productManager->getOneProduct($id);


        $url = 'uploads/' . $paf['imageUrl'];

        unlink($url);

        $productManager->deleteProducts($id);
        $products = $productManager->getAllProducts();
        return $this->twig->render('admin/admin_products.html.twig', array(
            'products' => $products
        ));
    }

}



