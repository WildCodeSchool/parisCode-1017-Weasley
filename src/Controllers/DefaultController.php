<?php

namespace Weasley\Controllers;

use Weasley\Model\Repository\UserManager;
use Weasley\Model\Repository\ProductManager;
use Weasley\Model\Repository\ContactManager;

/**
 * Class DefaultController
 * @package MyApp\Controllers
 */
class DefaultController extends Controller
{
    /**
     * Render index
     */
    public function indexAction()
    {
        return $this->twig->render('user/home.html.twig');
    }

    /**
     * Render concept
     */
    public function conceptAction()
    {
        return $this->twig->render('user/concept.html.twig');
    }

    /**
     * Render concept
     */
    public function mentionsAction()
    {
        return $this->twig->render('user/mentions_legales.html.twig');
    }

    /**
     * Render contact
     */
    public function contactAction()
    {
        $contact = new ContactManager();
        $coordonnees = $contact->getContact();


        return $this->twig->render('user/contact.html.twig', array(
            "coordonnees" => $coordonnees
        ));
    }

    /*    public function formAction()
        {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $errors = [];
                foreach ($_POST as $key => $value) {
                    if (empty($_POST[$key])) {
                        $errors[$key] = "Veuillez renseigner le champ " . $key;
                    }
                }

                if (!empty($errors)) {
                    return $this->twig->render('user/contact.html.twig', array(
                        'errors' => $errors
                    ));
                } else {
                    //faire le lien mail reception et envoi
                }
                return $this->twig->render('user/success.html.twig');
            }
            return $this->twig->render('user/contact.html.twig', array(
                'products' => $products
            ));
        }*/


    public function produitsAction()
    {
        $productManager = new ProductManager();
        $friandises = $productManager->getAllFriandises();
        $farces = $productManager->getAllFarces();
        $accessoires = $productManager->getAllAccessoires();
        $packs = $productManager->getAllPacks();
        return $this->twig->render('user/produits.html.twig', array(
            "friandises" => $friandises,
            "farces" => $farces,
            "accessoires" => $accessoires,
            "packs" => $packs
        ));
    }

}