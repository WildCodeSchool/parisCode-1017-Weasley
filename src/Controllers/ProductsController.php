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

class ProductsController extends Controller
{
     /**
     *
     */

    public function deleteProductAction()
    {
        $id= $_GET['id'];
        $productManager = new ProductManager();
        $productManager->deleteProducts($id);
        header('Location: index.php?section=admin&page=admin_products');
    }

}




