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


    /**
     * @return string
     */
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
            }
            // Récupérer le tableau d'image envoyé par le formulaire
                $files = $_FILES['image'];
                $upload = new Uploads();
            // Parcourir le tableau d'image
            foreach ($files['name'] as $position => $file_name) {

                // Pour chaque image, vérifier s'il n'y a pas d'erreur lié à php ($_FILES['files']['error']
                $error = $files['error'][$position];
                if ($error != 0) {
                    // S'il il y a une erreur php, stocker le message d'erreur dans une variable
                    $error[$file_name] = "erreur PHP";

                    // Sinon on upload
                } else {

                    // Récupération et stockage du name, tmp_name, size du fichier
                    $size = $files['size'][$position];
                    $tmp_name = $files['tmp_name'][$position];

                    // Instanciation d'un objet UploadedFile
                    $uploadedFile = new UploadedFile($file_name, $tmp_name, $size);

                    // Upload du fichier via la méthode définie dans le service
                    $result = $upload->upload($uploadedFile);

                    // Récupération des infos du formulaire

                    $nomProduit = $_POST ['nomProduit'];
                    $descriptionProduit = $_POST ['descriptionProduit'];
                    $imageUrl = $_POST ['imageUrl'];
                    $catProduit = $_POST ['categorie'];

                    // Requete BDD
                    $productManager->createProduct($nomProduit, $descriptionProduit, $catProduit, $imageUrl);
                    // Traitement du resultat, si pas d'erreur, on enregitre en BDD, sinon, on ajoute un message en session
                    if ($result == null){
                        $productManager->addImage($uploadedFile->getFileName());
                    }
                }// Redirection vers la page de succès
                return $this->twig->render('admin/admin_successAddProduit.html.twig');
            }return $this->twig->render('admin/admin_new_product.html.twig');
        }
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



