<?php

namespace Weasley\Model\Repository;

use PDO;
use Weasley\Model\Entity\User;

/**
 * Class UserManager
 * @package MyApp\Repository
 */
class UserManager extends EntityManager
{
	/**
	 * Get all user
	 * @return array
	 */
	public function getAll(){
		$statement = $this->db->query('SELECT * FROM user');
		return $statement->fetchAll(PDO::FETCH_OBJ, User::class);
	}

	/**
	 * Get one user
	 * @param $id int
	 * @return mixed
	 */
	public function getOne($id){
		$statement = $this->db->prepare("SELECT * FROM user WHERE id = :id");
		$statement->execute([
			':id' => $id
		]);
		return $statement->fetch();
	}

	/**
	 * Add one user
	 */
	public function add(){
//		....
	}

	/**
	 * Update one user
	 */
	public function update(){
//		....
	}

	/**
	 * Delete one user
	 */
	public function delete(){
//		....
	}
	public function updateContact(){
	    $statement = $this->db->query('UPDATE table_coordonnes SET 'adresse=)
    }
}

class ModelManager extends Manager
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
    }