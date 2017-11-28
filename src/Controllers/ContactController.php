<?php
/**
 * Created by PhpStorm.
 * User: valerianearon
 * Date: 28/11/2017
 * Time: 14:57
 */

namespace Weasley\Controllers;
use Weasley\Model\Repository\UserManager;

class ContactController extends Controller
{
    /**
     * Render contact
     */
    public function contactAction()
    {
        return $this->twig->render('user/contact.html.twig');
    }

}