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

{ /**
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
        $contact = new AdminManager();
        $coordonnees = $contact -> getContact();
        var_dump($coordonnees); die();

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