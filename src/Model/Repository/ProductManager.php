<?php

namespace Weasley\Model\Repository;

use PDO;
use Weasley\Model\Entity\Contact;
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
	public function getProduct(){
		$statement = $this->db->query('SELECT * FROM produits');
		return $statement->fetchObject(Products::class);
	}

//	/**
//	 * Get one user
//	 * @param $id int
//	 * @return mixed
//	 */
//	public function getOne($id){
//		$statement = $this->db->prepare("SELECT * FROM contact WHERE id = :id");
//		$statement->execute([
//			':id' => $id
//		]);
//		return $statement->fetch();
//	}


	/**
	 * Update contact
//	 */
	public function updateProduct(){
//	    $statement = $this->db->query('UPDATE contact SET (adresse= :adresse, telephone= :telephone, ouverture= :ouverture, commentaire= :commentaire) WHERE id=1');
//	    $statement -> execute([
//	        ':adresse' => $adresse,
//            ':telephone' => $telephone,
//            ':ouverture' => $ouverture,
//            ':commentaire' => $commentaire,
//
//        ]);
//    } Modifier les noms des champs pour correspondre à ceux de la bdd + modifier query SET
//}

