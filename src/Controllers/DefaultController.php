<?php

namespace Weasley\Controllers;

use Weasley\Model\Repository\UserManager;

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
     * Render product
     */
    public function produitsAction()
    {
        return $this->twig->render('user/produits.html.twig');
    }

    /**
     * Render contact
     */
    public function contactAction()
    {
        return $this->twig->render('user/contact.html.twig');
    }

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
        return $this->twig->render('admin/admin.html.twig');
    }

    /**
     * Render admin contact
     */
    public function adminContactAction()
    {
        return $this->twig->render('admin/admin_contact.html.twig');/*
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $errors = [];
            foreach ($_POST as $key => $value) {
                if (empty($_POST[$key])) {
                    $errors[$key] = "Veuillez renseigner le champ " . $key;
                }
            }

            if (!empty($errors)) {
                return $this->twig->render('admin/admin_contact.html.twig', array(
                    'errors' => $errors
                ));

            } else {
                $adresse = $_POST['adresse'];
                $horaire = $_POST['horaire'];
                $numero = $_POST['numero'];
                $commentaire = $_POST['commentaire'];
                $manager = new ModelManager();
                $manager->updateContact($adresse, $horaire, $numero, $commentaire);
            }
            return $this->twig->render('admin/admin_contact.html.twig');
        }*/
    }
}