<?php

namespace Weasley\Model\Repository;

use PDO;
use Weasley\Model\Entity\Contact;
use Weasley\Model\Entity\Product;
use Weasley\Model\Entity\User;

/**
 * Class UserManager
 * @package MyApp\Repository
 */
class ProductManager extends EntityManager
{
	/**
	 * Get all user
	 * @return array
	 */
	public function getAllProducts(){
		$statement = $this->db->query('SELECT * FROM produits');
		return $statement->fetchAll(PDO::FETCH_CLASS,Product::class);
	}

}

