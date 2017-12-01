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

    public function getAllFriandises(){
        $statement = $this->db->query('SELECT * FROM produits WHERE catProduit= "friandises"');
        return $statement->fetchAll(PDO::FETCH_CLASS,Product::class);
    }

    public function getAllFarces(){
        $statement = $this->db->query('SELECT * FROM produits WHERE catProduit= "farces"');
        return $statement->fetchAll(PDO::FETCH_CLASS,Product::class);
    }

    public function getAllAccessoires(){
        $statement = $this->db->query('SELECT * FROM produits WHERE catProduit= "accessoires"');
        return $statement->fetchAll(PDO::FETCH_CLASS,Product::class);
    }

    public function getAllPacks(){
        $statement = $this->db->query('SELECT * FROM produits WHERE catProduit= "packs"');
        return $statement->fetchAll(PDO::FETCH_CLASS,Product::class);
    }

    public function updateProducts($id, $nomProduit, $descriptionProduit, $imageUrl, $catProduit){
        $statement = $this->db->prepare('UPDATE produits SET nomProduit = :nomProduit, descriptionProduit = :descriptionProduit, imageUrl = :imageUrl, catProduit = :catProduit WHERE id = :id');
        $statement->execute([
            ':id' => $id,
            ':nomProduit' => $nomProduit,
            ':descriptionProduit' => $descriptionProduit,
            ':imageUrl' => $imageUrl,
            ':catProduit' => $catProduit

        ]);
    }

    public function createProduct($nomProduit, $descriptionProduit, $imageUrl, $catProduit){
        $statement = $this->db->prepare('INSERT INTO produits (nomProduit, descriptionProduit, catProduit) VALUES (:nomProduit, :descriptionProduit, :catProduit)');
        $statement->execute([
            ':nomProduit' => $nomProduit,
            ':descriptionProduit' => $descriptionProduit,
//            ':imageUrl' => $imageUrl,
            ':catProduit' => $catProduit
        ]);
    }

}

