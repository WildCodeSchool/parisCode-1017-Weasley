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
	public function indexAction(){
		return $this->twig->render('user/home.html.twig');
	}

	/**
	 * @return string
	 */
	public function conceptAction(){
        return $this->twig->render('user/concept.html.twig');
	}
    /**
     * @return string
     */
    public function produitsAction(){
        return $this->twig->render('user/produits.html.twig');
    }

    /**
     * Render contact
     */
	public function contactAction(){
        return $this->twig->render('user/contact.html.twig');
	}

    /**
     * Render login
     */
	public function loginAction(){
	    return $this->twig->render('admin/login.html.twig');
    }

    /**
     * Render admin
     */
    public function adminAction(){
        return $this->twig->render('admin/admin.html.twig');
    }

    /**
     * Render admin contact
     */
    public function adminContactAction(){
        return $this->twig->render('admin/admin_contact.html.twig');
    }
}