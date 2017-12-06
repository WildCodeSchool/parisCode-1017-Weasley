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

	/**
	 * Update contact
	 */
	public function updateContact($id, $adresse, $telephone, $ouverture, $commentaire){
	    $statement = $this->db->prepare('UPDATE contact SET adresse = :adresse, telephone = :telephone, ouverture = :ouverture, commentaire = :commentaire WHERE id = :id');
	    $statement->execute([
	        ':id' => $id,
	        ':adresse' => $adresse,
            ':telephone' => $telephone,
            ':ouverture' => $ouverture,
            ':commentaire' => $commentaire

        ]);
    }
}

