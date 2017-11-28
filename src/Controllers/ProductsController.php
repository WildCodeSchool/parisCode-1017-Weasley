<?php
/**
 * Created by PhpStorm.
 * User: valerianearon
 * Date: 28/11/2017
 * Time: 14:57
 */

namespace Weasley\Controllers;
use Weasley\Model\Repository\UserManager;

class ProductsController extends Controller
{
    /**
     * Render product
     */
    public function produitsAction()
    {
        return $this->twig->render('user/produits.html.twig');
    }

}