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
     * Render contact
     */
	public function contactAction(){
        return $this->twig->render('user/contact.html.twig');
	}

}