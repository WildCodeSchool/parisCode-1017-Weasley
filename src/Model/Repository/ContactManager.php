<?php

namespace Weasley\Model\Repository;

use PDO;
use Weasley\Model\Entity\Contact;
use Weasley\Model\Entity\User;

/**
 * Class UserManager
 * @package MyApp\Repository
 */
class ContactManager extends EntityManager
{
	/**
	 * Get all user
	 * @return array
	 */
	public function getContact(){
		$statement = $this->db->query('SELECT * FROM contact');
		return $statement->fetchObject(Contact::class);
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
	public function updateContact(){
	    $statement = $this->db->query('UPDATE contact SET (adresse= :adresse, telephone= :telephone, ouverture= :ouverture, commentaire= :commentaire) WHERE id=1');
	    $statement -> execute([
	        ':adresse' => $adresse,
            ':telephone' => $telephone,
            ':ouverture' => $ouverture,
            ':commentaire' => $commentaire,

        ]);
    }
}

