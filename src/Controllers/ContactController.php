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
        $coordonnees = $contact -> getContact();


        return $this->twig->render('user/contact.html.twig', array (
            "coordonnees" => $coordonnees
        ) );
    }

    public function contactUpdateAction()
    {
        $adresse = $_POST ['adresse'];
        $telephone = $_POST ['telephone'];
        $ouverture = $_POST ['ouverture'];
        $commentaire = $_POST ['commentaire'];

        $contactManager = new ContactManager();
        $contactManager -> updateContact();


    }

}
