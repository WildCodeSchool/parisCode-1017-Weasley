<?php

namespace Weasley\Model\Entity;

/**
 * Class Product
 * @package Weasley\Model\Entity
 */
class Product
{
    /**
 * @var string
 */

    private $id_produit;

    private $description_produit;

    private $nom_produit;

    private $image_url;

    private $cat_produits;


    /**
     * @return string
     */
    public function getIdProduit(): string
    {
        return $this->id_produit;
    }


    /**
     * @return mixed
     */
    public function getDescriptionProduit()
    {
        return $this->description_produit;
    }

    /**
     * @param mixed $description_produit
     */
    public function setDescriptionProduit($description_produit)
    {
        $this->description_produit = $description_produit;
    }

    /**
     * @return mixed
     */
    public function getNomProduit()
    {
        return $this->nom_produit;
    }

    /**
     * @param mixed $nom_produit
     */
    public function setNomProduit($nom_produit)
    {
        $this->nom_produit = $nom_produit;
    }

    /**
     * @return mixed
     */
    public function getImageUrl()
    {
        return $this->image_url;
    }

    /**
     * @param mixed $image_url
     */
    public function setImageUrl($image_url)
    {
        $this->image_url = $image_url;
    }

    /**
     * @return mixed
     */
    public function getCatProduits()
    {
        return $this->cat_produits;
    }


}