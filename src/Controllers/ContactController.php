<?php
/**
 * Created by PhpStorm.
 * User: valerianearon
 * Date: 28/11/2017
 * Time: 14:57
 */

namespace Weasley\Controllers;
use Weasley\Model\Repository\ContactManager;
use Weasley\Model\Repository\UserManager;

class ContactController extends Controller
{
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

    public function contactUpdateAction()
    {
        $contactManager = new ContactManager();
        $coordonnees = $contactManager->getContact();

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
                $id = $_GET['id'];
                $adresse = $_POST ['adresse'];
                $telephone = $_POST ['telephone'];
                $ouverture = $_POST ['ouverture'];
                $commentaire = $_POST ['commentaire'];

                $contactManager->updateContact($id, $adresse, $telephone, $ouverture, $commentaire);

            }   return $this->twig->render('admin/admin_success.html.twig');
        }  return $this->twig->render('admin/admin_contact.html.twig', array(
        "coordonnees" => $coordonnees
    ));
    }
}
