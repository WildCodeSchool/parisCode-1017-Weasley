<?php

namespace Weasley\Model\Repository;

use PDO;
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
	public function getAll(){
		$statement = $this->db->query('SELECT * FROM contact');
		return $statement->fetchAll(PDO::FETCH_OBJ, User::class);
	}

	/**
	 * Get one user
	 * @param $id int
	 * @return mixed
	 */
	public function getOne($id){
		$statement = $this->db->prepare("SELECT * FROM contact WHERE id = :id");
		$statement->execute([
			':id' => $id
		]);
		return $statement->fetch();
	}


	/**
	 * Update contact
	 */
	public function updateContact(){
	    $statement = $this->db->query('UPDATE contact SET WHERE'adresse= :adresse, telephone= :telephone, ouverture= :ouverture, commentaire= :commentaire)
    }
}

/*class ModelManager extends Manager
{
    public function addUser($nom, $prenom, $pseudo, $date, $adresse){
        $req=$this->db->prepare("INSERT INTO user (nom, prenom, pseudo, date, adresse) VALUES (:nom, :prenom, :pseudo, :date, :adresse)");
        $req->execute([
            ':nom'=>$nom,
            ':prenom'=>$prenom,
            ':pseudo'=>$pseudo,
            ':date'=>$date,
            ':adresse'=>$adresse
        ]);
    }*/