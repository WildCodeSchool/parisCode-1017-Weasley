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

    public function sendEmail($infoForm) {
        // Create the Transport
        $transport = (new \Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
            ->setUsername('weasleysfredetgeorges@gmail.com')
            ->setPassword('carovaleli');

        // Create the Mailer using your created Transport
        $mailer = new \Swift_Mailer($transport);

        // Create a message
        $message = (new \Swift_Message('Voici le message de votre client'))
            ->setFrom([$infoForm['email'] => $infoForm['fn']])
            ->setTo(['weasleysfredetgeorges@gmail.com' => 'Fred et Georges Weasley'])
            ->setBody($infoForm['message']." ".$infoForm['email']);

        // Send the message

//        $mailer->send($message);

        return $this->twig->render('user/success.html.twig');
    }

    public function contactUsAction(){
        if ($_POST) {
            // errors array
            $errors = array();
            //start validation
            if (empty($_POST[''])) {
                $errors['fn']="Merci de bien vouloir saisir votre nom";
            }
            if (empty($_POST['ln'])) {
                $errors['ln']="Merci de bien vouloir saisir votre prénom";
            }
            if (empty($_POST['phone'])) {
                $errors['phone']="Merci de bien vouloir saisir votre numéro de téléphone";
            }
            if (empty($_POST['email'])) {
                $errors['email']="Merci de bien vouloir saisir votre adresse email";
            }
            if (empty($_POST['message'])) {
                $errors['message']="Merci de bien vouloir saisir votre message";
            }
            if (count($errors) > 0){
                return $this->twig->render('user/contact.html.twig', array(
                    'errors' => $errors,
                    'post' => $_POST
                ));
            }
            else {
                return $this->sendEmail($_POST);
            }
        }
        return $this->twig->render('user/contact.html.twig');
    }
}